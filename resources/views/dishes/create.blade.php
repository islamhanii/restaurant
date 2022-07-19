@extends('layout')
@extends('partials._body')
@extends('partials._navbar')
@extends('partials._settings-panel')
@extends('partials._sidebar')
@extends('partials._footer')

@section('page-title') Create Dish @endsection
@section('dishes-link-active') active @endsection
@section('create-dish-link-active') active @endsection

@section('main')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Our new dish</h4>
        <form class="forms-sample" method="POST" action="{{url("/dishes/store")}}" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="exampleInputUsername1">Name</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{old('name')?old('name'):''}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description">{{old('description')?old('description'):''}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlNumber1">Price</label>
                <input type="number" class="form-control" id="exampleFormControlNumber1" name="price" value="{{old('price')?old('price'):''}}" step=".01">
            </div>
            <div class="form-group">
                <label for="validationCustom04">Category</label>
                <select class="custom-select" id="validationCustom04" name="category_id">
                  <option selected disabled value="">Choose...</option>
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
                  @endforeach
                </select>
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