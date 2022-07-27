@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('page-title') All Dishes @endsection
@section('categories-link-active') active @endsection

@section('main')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><span class="text-primary">{{$category->name}}</span> category</h4>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="d-none d-lg-table-cell d-xl-table-cell">Photo</th>
                <th>Dish name</th>
                <th class="d-none d-xl-table-cell">Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($category->dishes as $dish)
                    <tr>
                        <td class="py-1 d-none d-lg-table-cell d-xl-table-cell"><img src="{{asset("uploads/" . $dish->image)}}" alt="{{$dish->name}}"></td>
                        <td>{{$dish->name}}</td>
                        <td class="d-none d-xl-table-cell">{{$dish->price}}</td>
                        <td>
                          <a href="{{route("dish.show", $dish->id)}}" class="btn btn-dark btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <a href="{{route("dish.edit", $dish->id)}}" class="btn btn-warning btn-rounded btn-icon ml-2">
                            <i class="mdi mdi-lead-pencil"></i>
                          </a>
                          <button type="button" class="btn btn-danger btn-rounded btn-icon ml-2" data-bs-toggle="modal" data-bs-target="#deleteDish{{$dish->id}}">
                              <i class="mdi mdi-delete"></i>
                          </button>
                          <div class="modal fade" id="deleteDish{{$dish->id}}" tabindex="-1" aria-labelledby="deleteDishTitle{{$dish->id}}" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteDishTitle{{$dish->id}}">Delete <span class="text-primary">{{$dish->name}}</span></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you sure, you want to delete this dish?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form method="POST" action="{{route("dish.delete")}}">
                                      @csrf
                                      @method("DELETE")
                                      <input type="hidden" name="id" value="{{$dish->id}}">
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