@extends('layout')
@extends('partials._body')
@extends('partials._navbar')
@extends('partials._settings-panel')
@extends('partials._sidebar')
@extends('partials._footer')

@section('page-title') All Categories @endsection
@section('cats-link-active') active @endsection
@section('all-cats-link-active') active @endsection

@section('main')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Our main categories</h4>
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
                <th>Category name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $count => $category)
                    <tr>
                        <td>{{$count+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                          <a href="{{url("categories/show/$category->id")}}" class="btn btn-dark btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <a href="{{url("categories/edit/$category->id")}}" class="btn btn-warning btn-rounded btn-icon ml-2">
                            <i class="mdi mdi-lead-pencil"></i>
                          </a>
                          <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deleteCategory{{$category->id}}">
                              <i class="mdi mdi-delete"></i>
                          </button>
                          <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="deleteCategoryTitle{{$category->id}}" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCategoryTitle{{$category->id}}">Delete <span class="text-primary">{{$category->name}}</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure, you want to delete this category?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form method="POST" action="{{url("categories/delete")}}">
                                      @csrf
                                      @method("DELETE")
                                      <input type="hidden" name="id" value="{{$category->id}}">
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