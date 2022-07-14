@extends('layout')
@extends('partials._navbar')
@extends('partials._settings-panel')
@extends('partials._sidebar')
@extends('partials._footer')

@section('main')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Our new chef</h4>
        <form class="forms-sample" method="POST" action="{{url("/chefs/store")}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputUsername1">Name</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description"></textarea>
            </div>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="image">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-primary me-2">ADD</button>
        </form>
    </div>
    </div>
</div>

@endsection