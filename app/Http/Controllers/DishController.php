<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageStorage;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    use ImageStorage;

    private $dishModel;
    private $categoryModel;

    public function __construct(Dish $dish, Category $category) {
        $this->dishModel = $dish;
        $this->categoryModel = $category;
    }

    /*******************************************************************************************/

    public function index() {
        $dishes = $this->dishModel->with('category')->get();
        return view('admins.dishes.index', compact('dishes'));
    }

    public function show($dish_id) {
        $dish = $this->dishModel->findOrFail($dish_id);
        return view('admins.dishes.show', compact('dish'));
    }

    /*******************************************************************************************/

    public function create() {
        $categories = $this->categoryModel->get();
        return view('admins.dishes.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:10|max:5000',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512',
            'price' => 'required|numeric|min:0|max:1000000',
            'category_id' => 'required|exists:categories,id'
        ]);

        $path = $this->uploadImage($request, 'dishes');

        $this->dishModel->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);

        session()->flash('success', 'Dish was added successfully');

        return redirect(route('dish.create'));
    }

    /*******************************************************************************************/

    public function edit($dish_id) {
        $dish = $this->dishModel->findOrFail($dish_id);
        $categories = $this->categoryModel->get();
        return view('admins.dishes.edit', compact('dish', 'categories'));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:dishes,id',
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:10|max:5000',
            'image' => 'image|mimes:jpg,png,jpeg|max:512',
            'price' => 'required|numeric|min:0|max:1000000',
            'category_id' => 'required|exists:categories,id'
        ]);

        $dish = $this->dishModel->find($request->id);
        $path = $this->uploadImage($request, 'dishes', $dish);

        $dish->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);

        session()->flash('success', 'Dish was updated successfully');

        return redirect(route('dish.edit', $dish->id));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:dishes,id'
        ], [
            '*' => 'You try to delete unfounded Dish'
        ]);

        $dish = $this->dishModel->find($request->id);
        $dish->delete();
        $this->deleteImage($dish->image);

        session()->flash('success', 'Dish was deleted successfully');
        return redirect(route('dishes'));
    }
}
