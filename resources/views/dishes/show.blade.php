@extends('layout')
@extends('partials._body')
@extends('partials._navbar')
@extends('partials._settings-panel')
@extends('partials._sidebar')
@extends('partials._footer')

@section('page-title') Dish ({{$dish->name}}) @endsection
@section('dishes-link-active') active @endsection

@section('main')
<div class="grid-margin stretch-card">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-start justify-content-center p-3">
                <img src="{{asset("uploads/" . $dish->image)}}" alt="{{$dish->name}}" class="rounded mw-100">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title">{{$dish->name}}</h5>
                      <span class="text-primary">({{$dish->price}} $)</span>
                    </div>
                    <p class="card-text"><?= nl2br(htmlspecialchars($dish->description)) ?></p>
                    <p class="card-text"><small class="text-muted">Added at {{$dish->created_at}}</small></p>
                    <div>
                        <a href="{{url("dishes/edit/$dish->id")}}" class="btn btn-warning btn-rounded btn-icon">
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deletChef">
                            <i class="mdi mdi-delete"></i>
                        </button>
                        <div class="modal fade" id="deletChef" tabindex="-1" aria-labelledby="deletDishTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deletDishTitle">Delete <span class="text-primary">{{$dish->name}}</span></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure, you want to delete this dish?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form method="POST" action="{{url("dishes/delete")}}">
                                    @csrf
                                    @method("DELETE")
                                    <input type="hidden" name="id" value="{{$dish->id}}">
                                    <button type="submit" class="btn btn-danger btn-icon">Confirm Delete</a>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection