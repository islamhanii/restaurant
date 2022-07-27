<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageStorage;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    use ImageStorage;

    private $detailModel;

    public function __construct(Detail $detail) {
        $this->detailModel = $detail;
    }

    /*******************************************************************************************/

    public function index() {
        $details = $this->detailModel->get();
        return view('admins.details.index', compact('details'));
    }

    public function show($detail_id) {
        $detail = $this->detailModel->findOrFail($detail_id);
        return view('admins.details.show', compact('detail'));
    }

    /*******************************************************************************************/

    public function create() {
        return view('admins.details.create');
    }

    public function store(Request $request) {
        $request->validate([
            'body' => 'required|string|min:10|max:5000',
            'image' => 'image|mimes:jpg,png,jpeg|max:512'
        ]);

        $path = $this->uploadImage($request, 'about_us');

        $this->detailModel->create([
            'body' => $request->body,
            'image' => $path
        ]);

        session()->flash('success', 'Detail was added successfully');

        return redirect(route('detail.create'));
    }

    /*******************************************************************************************/

    public function edit($detail_id) {
        $detail = $this->detailModel->findOrFail($detail_id);
        return view('admins.details.edit', compact('detail'));
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:about_us,id',
            'body' => 'required|string|min:10|max:5000',
            'image' => 'image|mimes:jpg,png,jpeg|max:512'
        ]);

        $detail = $this->detailModel->find($request->id);
        $path = $this->uploadImage($request, 'about_us', $detail);

        $detail->update([
            'name' => $request->name,
            'body' => $request->body,
            'image' => $path
        ]);

        session()->flash('success', 'Detail was updated successfully');

        return redirect(route('detail.edit', $detail->id));
    }

    /*******************************************************************************************/

    public function delete(Request $request) {
        $request->validate([
            'id' => 'required|exists:about_us,id'
        ], [
            '*' => 'You try to delete unfounded Detail'
        ]);

        $detail = $this->detailModel->find($request->id);
        $detail->delete();
        $this->deleteImage($detail->image);

        session()->flash('success', 'Detail was deleted successfully');
        return redirect(route('details'));
    }
}
