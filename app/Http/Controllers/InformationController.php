<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    private $informationModel;

    public function __construct(Information $information) {
        $this->informationModel = $information;
    }

    /*******************************************************************************************/

    public function index() {
        $information = $this->informationModel->get();
        return view('information.index', compact('information'));
    }

    public function show($information_id) {
        $information = $this->informationModel->findOrFail($information_id);
        return view('information.show', compact('information'));
    }

    /*******************************************************************************************/

    public function create() {
        return view('information.create');
    }

    public function store(Request $request) {
        $request->validate([
            'type' => 'required|string|min:3|max:250',
            'value' => 'required|string|min:3|max:250'
        ]);

        $this->informationModel->create([
            'type' => $request->type,
            'value' => $request->value
        ]);

        session()->flash('success', 'Information was added successfully');

        return redirect(url("/information/create"));
    }

    /*******************************************************************************************/

    public function edit($information_id) {
        $information = $this->informationModel->findOrFail($information_id);
        return view('information.edit', compact('information'));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:information,id',
            'type' => 'required|string|min:3|max:250',
            'value' => 'required|string|min:3|max:250'
        ]);

        $information = $this->informationModel->find($request->id);

        $information->update([
            'type' => $request->type,
            'value' => $request->value
        ]);

        session()->flash('success', 'Information was updated successfully');

        return redirect(url("/information/edit/$request->id"));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:information,id'
        ], [
            '*' => 'You try to delete unfounded Information'
        ]);

        $information = $this->informationModel->find($request->id);
        $information->delete();

        session()->flash('success', 'Information was deleted successfully');
        return redirect(url("/information"));
    }
}
