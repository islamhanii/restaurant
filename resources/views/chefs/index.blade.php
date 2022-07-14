@extends('layout')
@extends('partials._navbar')
@extends('partials._settings-panel')
@extends('partials._sidebar')
@extends('partials._footer')

@section('main')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Our best chefs</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Chef name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($chefs as $chef)
                    <tr>
                        <td class="py-1"><img src="{{asset("uploads/" . $chef->image)}}" alt="{{$chef->name}}"></td>
                        <td>{{$chef->name}}</td>
                        <td>{{$chef->description}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection