<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    public function index() {
        $chefs = Chef::get();
        return view('chefs.index', compact('chefs'));
    }

    public function create() {
        return view('chefs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:150',
            'description' => 'required|string|min:10|max:500',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:512'
        ]);

        $path = Storage::putFile('chefs', $request->file('image'));

        Chef::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect(url("/chefs"));
    }
}
