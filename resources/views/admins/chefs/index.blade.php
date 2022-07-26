@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('page-title') Chefs @endsection
@section('chefs-link-active') active @endsection
@section('all-chefs-link-active') active @endsection

@section('main')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Our best chefs</h4>
        @if(Session::has('success'))
            <div class="col-12 mb-2 alert-success rounded-3 p-2">
                <p class="mb-0 lh-base">{{Session::get('success')}}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="col-12 mb-2 alert-danger rounded-3 p-2">
                @foreach ($errors->all() as $error)
                <p class="mb-0 lh-base">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="d-none d-lg-table-cell d-xl-table-cell">Photo</th>
                <th>Chef name</th>
                <th colspan="2" class="d-none d-xl-table-cell">Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($chefs as $chef)
                    <tr>
                        <td class="py-1 d-none d-lg-table-cell d-xl-table-cell"><img src="{{asset("uploads/" . $chef->image)}}" alt="{{$chef->name}}"></td>
                        <td>{{$chef->name}}</td>
                        <td colspan="2" class="text-wrap lh-lg d-none d-xl-table-cell"><p class="ellipsis-text">{{$chef->description}}</p></td>
                        <td>
                          <a href="{{route("chef.show", $chef->id)}}" class="btn btn-dark btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <a href="{{route("chef.edit", $chef->id)}}" class="btn btn-warning btn-rounded btn-icon ml-2">
                            <i class="mdi mdi-lead-pencil"></i>
                          </a>
                          <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deleteChef{{$chef->id}}">
                              <i class="mdi mdi-delete"></i>
                          </button>
                          <div class="modal fade" id="deleteChef{{$chef->id}}" tabindex="-1" aria-labelledby="deleteChefTitle{{$chef->id}}" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteChefTitle{{$chef->id}}">Delete <span class="text-primary">{{$chef->name}}</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure, you want to delete this chef?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form method="POST" action="{{route("chef.delete")}}">
                                      @csrf
                                      @method("DELETE")
                                      <input type="hidden" name="id" value="{{$chef->id}}">
                                      <button type="submit" class="btn btn-danger btn-icon">Confirm Delete</a>
                                    </form>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection