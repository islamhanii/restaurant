<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageStorage;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    use ImageStorage;

    private $chefModel;

    public function __construct(Chef $chef) {
        $this->chefModel = $chef;
    }

    /*******************************************************************************************/

    public function index() {
        $chefs = $this->chefModel->get();
        return view('admins.chefs.index', compact('chefs'));
    }

    public function show($chef_id) {
        $chef = $this->chefModel->findOrFail($chef_id);
        return view('admins.chefs.show', compact('chef'));
    }

    /*******************************************************************************************/

    public function create() {
        return view('admins.chefs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:10|max:5000',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512'
        ]);

        $path = $this->uploadImage($request, 'chefs');

        $this->chefModel->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path
        ]);

        session()->flash('success', 'Chef was added successfully');

        return redirect(route('chef.create'));
    }

    /*******************************************************************************************/

    public function edit($chef_id) {
        $chef = $this->chefModel->findOrFail($chef_id);
        return view('admins.chefs.edit', compact('chef'));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:chefs,id',
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:10|max:5000',
            'image' => 'image|mimes:jpg,png,jpeg|max:512'
        ]);

        $chef = $this->chefModel->find($request->id);
        $path = $this->uploadImage($request, 'chefs', $chef);

        $chef->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path
        ]);

        session()->flash('success', 'Chef was updated successfully');

        return redirect(route('chef.edit', $chef->id));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:chefs,id'
        ], [
            '*' => 'You try to delete unfounded Chef'
        ]);

        $chef = $this->chefModel->find($request->id);
        $chef->delete();
        $this->deleteImage($chef->image);

        session()->flash('success', 'Chef was deleted successfully');
        return redirect(route('chefs'));
    }
}
