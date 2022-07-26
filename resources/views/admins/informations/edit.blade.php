@extends('admins.layout')
@extends('admins.partials._body')
@extends('admins.partials._navbar')
@extends('admins.partials._settings-panel')
@extends('admins.partials._sidebar')
@extends('admins.partials._footer')

@section('page-title') Create Information @endsection
@section('informations-link-active') active @endsection

@section('main')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Update <span class="text-primary">information</span></h4>
        <form class="forms-sample" method="POST" action="{{route("information.update")}}">
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
            <input type="hidden" name="id" value="{{$information->id}}">
            <div class="form-group">
                <label for="validationCustom04">Type</label>
                <select class="custom-select" id="validationCustom04" name="type">
                  <option selected disabled value="">Choose...</option>
                  @foreach ($types as $key => $value)
                    <option value="{{$key}}" 
                    @if(old('type'))
                        @if(old('type') == $key) selected @endif
                    @else
                        @if($information->type == $key) selected @endif
                    @endif>
                    {{$value}}
                </option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Body</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="value" value="{{old('value')?old('value'):$information->value}}">
            </div>
            <button type="submit" class="btn btn-primary me-2">EDIT</button>
        </form>
    </div>
    </div>
</div>

@endsection