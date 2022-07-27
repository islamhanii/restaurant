@section('chefs')

<!-- Team Section -->
<div id="team" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="col-md-10 col-md-offset-1 section-title">
                <h2>Meet Our Chefs</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
            </div>
            <div id="row">
                @foreach ($chefs as $chef)
                <div class="col-md-4 team">
                    <div class="thumbnail">
                        <div class="team-img"><img src="{{asset("uploads/" . $chef->image)}}" alt="{{$chef->name}}"></div>
                        <div class="caption">
                            <h3>{{$chef->name}}</h3>
                            <p>{{$chef->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection