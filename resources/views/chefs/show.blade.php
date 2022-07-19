@extends('layout')
@extends('partials._body')
@extends('partials._navbar')
@extends('partials._settings-panel')
@extends('partials._sidebar')
@extends('partials._footer')

@section('page-title') Chef ({{$chef->name}}) @endsection
@section('chefs-link-active') active @endsection

@section('main')
<div class="grid-margin stretch-card">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-start justify-content-center p-3">
                <img src="{{asset("uploads/" . $chef->image)}}" alt="{{$chef->name}}" class="rounded mw-100">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$chef->name}}</h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($chef->description)) ?></p>
                    <p class="card-text"><small class="text-muted">Join at {{$chef->created_at}}</small></p>
                    <div>
                        <a href="{{url("chefs/edit/$chef->id")}}" class="btn btn-warning btn-rounded btn-icon">
                            <i class="mdi mdi-lead-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deletChef">
                            <i class="mdi mdi-delete"></i>
                        </button>
                        <div class="modal fade" id="deletChef" tabindex="-1" aria-labelledby="deletChefTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="deletChefTitle">Delete <span class="text-primary">{{$chef->name}}</span></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure, you want to delete this chef?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form method="POST" action="{{url("chefs/delete")}}">
                                    @csrf
                                    @method("DELETE")
                                    <input type="hidden" name="id" value="{{$chef->id}}">
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