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
        return view('admins.contacts.index', compact('contacts'));
    }

    /*******************************************************************************************/

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:250',
            'email' => 'required|email:filter|max:250',
            'message' => 'required|string|min:10|max:5000'
        ]);

        $this->contactModel->create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        session()->flash('success', 'Message was sent successfully');

        return redirect()->back();
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

        session()->flash('success', 'Message was deleted successfully');
        return redirect(route('contacts'));
    }
}
