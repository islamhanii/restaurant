@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('page-title') About US @endsection
@section('informations-link-active') active @endsection
@section('all-informations-link-active') active @endsection

@section('main')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Informations</h4>
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
                <th>#</th>
                <th>Title</th>
                <th colspan="2" class="d-none d-xl-table-cell">Body</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($informations as $count => $information)
                    <tr>
                        <td>{{$count + 1}}</td>
                        <td class="text-capitalize">{{str_replace("-", " ", $information->type)}}</td>
                        <td colspan="2" class="text-wrap lh-lg d-none d-xl-table-cell"><p class="ellipsis-text">{{$information->value}}</p></td>
                        <td>
                          <a href="{{route("information.edit", $information->id)}}" class="btn btn-warning btn-rounded btn-icon">
                            <i class="mdi mdi-lead-pencil"></i>
                          </a>
                          <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deleteInformation{{$information->id}}">
                              <i class="mdi mdi-delete"></i>
                          </button>
                          <div class="modal fade" id="deleteInformation{{$information->id}}" tabindex="-1" aria-labelledby="deleteInformationTitle{{$information->id}}" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteInformationTitle{{$information->id}}">Delete <span class="text-primary">{{$information->name}}</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure, you want to delete this information?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form method="POST" action="{{route("information.delete")}}">
                                      @csrf
                                      @method("DELETE")
                                      <input type="hidden" name="id" value="{{$information->id}}">
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