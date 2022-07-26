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
        $informations = $this->informationModel->get();
        return view('admins.informations.index', compact('informations'));
    }

    /*******************************************************************************************/

    public function generateTypes() {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'opening-hours' => 'Opening Hours',
            'address' => 'Address',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram'
        ];
    }

    /*******************************************************************************************/

    public function create() {
        $types = $this->generateTypes();
        return view('admins.informations.create', compact('types'));
    }

    public function store(Request $request) {
        $request->validate([
            'type' => 'required|in:phone,email,opening-hours,address,facebook,youtube,twitter,instagram',
            'value' => 'required|string|min:3|max:250'
        ]);

        $this->informationModel->create([
            'type' => $request->type,
            'value' => $request->value
        ]);

        session()->flash('success', 'Information was added successfully');

        return redirect(route('information.create'));
    }

    /*******************************************************************************************/

    public function edit($information_id) {
        $information = $this->informationModel->findOrFail($information_id);
        $types = $this->generateTypes();
        return view('admins.informations.edit', compact('information', 'types'));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:informations,id',
            'type' => 'required|string|min:3|max:250',
            'value' => 'required|string|min:3|max:250'
        ]);

        $information = $this->informationModel->find($request->id);

        $information->update([
            'type' => $request->type,
            'value' => $request->value
        ]);

        session()->flash('success', 'Information was updated successfully');

        return redirect(route('information.edit'));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:informations,id'
        ], [
            '*' => 'You try to delete unfounded Information'
        ]);

        $information = $this->informationModel->find($request->id);
        $information->delete();

        session()->flash('success', 'Information was deleted successfully');
        return redirect(route('informations'));
    }
}
