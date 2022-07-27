<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryModel;

    public function __construct(Category $category) {
        $this->categoryModel = $category;
    }

    /*******************************************************************************************/

    public function index() {
        $categories = $this->categoryModel->get();
        return view('admins.categories.index', compact('categories'));
    }

    public function show($category_id) {
        $category = $this->categoryModel->with('dishes')->findOrFail($category_id);

        return view('admins.categories.show', compact('category'));
    }

    /*******************************************************************************************/

    public function create() {
        return view('admins.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|unique:categories|min:3|max:250'
        ]);

        $this->categoryModel->create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category was added successfully');

        return redirect(route('category.create'));
    }

    /*******************************************************************************************/

    public function edit($category_id) {
        $category = $this->categoryModel->findOrFail($category_id);
        return view('admins.categories.edit', compact('category'));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|string|unique:categories|min:3|max:250'
        ]);

        $category = $this->categoryModel->find($request->id);

        $category->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category was updated successfully');

        return redirect(route('category.edit', $category->id));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:categories,id'
        ], [
            '*' => 'You try to delete unfounded Category'
        ]);

        $category = $this->categoryModel->find($request->id);
        $category->delete();

        session()->flash('success', 'Category was deleted successfully');
        return redirect(route('categories'));
    }
}
