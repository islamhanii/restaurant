<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactModel;

    public function __construct(Contact $contact) {
        $this->contactModel = $contact;
    }

    /*******************************************************************************************/

    public function index() {
        $contacts = $this->contactModel->get();
        return view('contacts.index', compact('contacts'));
    }

    /*******************************************************************************************/

    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:250',
            'email' => 'required|email|max:250',
            'message' => 'required|string|min:10|max:5000'
        ]);

        $this->contactModel->create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        session()->flash('success', 'Contact was added successfully');

        return redirect(url("/contacts/create"));
    }

    /*******************************************************************************************/

    public function edit($contact_id) {
        $contact = $this->contactModel->findOrFail($contact_id);
        return view('contacts.edit', compact('contact '));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:contacts,id',
            'name' => 'required|string|min:3|max:250'
        ]);

        $contact = $this->contactModel->find($request->id);

        $contact->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Contact was updated successfully');

        return redirect(url("/contacts/edit/$request->id"));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:contacts,id'
        ], [
            '*' => 'You try to delete unfounded Contact '
        ]);

        $contact = $this->contactModel->find($request->id);
        $contact->delete();

        session()->flash('success', 'Contact was deleted successfully');
        return redirect(url("/contacts"));
    }
}
