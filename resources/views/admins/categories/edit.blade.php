@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('page-title') Edit Category ({{$category->name}}) @endsection
@section('cats-link-active') active @endsection

@section('main')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update <a href="{{route("category.show", $category->id)}}" class="text-decoration-none"><span class="text-primary">{{$category->name}}</span></a> category</h4>
            <form class="forms-sample" method="POST" action="{{route("category.update")}}">
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
                
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group">
                    <label for="exampleInputUsername1">Name</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{old('name')?old('name'):$category->name}}">
                </div>
                <button type="submit" class="btn btn-primary me-2">EDIT</button>
            </form>
        </div>
    </div>
</div>

@endsection