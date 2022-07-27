@section('menu')

<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Menu</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($menu as $key=>$category)
                
            <div class="col-xs-12 col-sm-6 @if($key%2 == 0) clearboth @endif">
                <div class="menu-section">
                    <h2 class="menu-section-title">{{$category->name}}</h2>
                    <hr>
                    @foreach ($category->dishes as $dish)
                    <div class="menu-item">
                        <div class="menu-item-name text-capitalize"> {{$dish->name}} </div>
                        <div class="menu-item-price"> ${{$dish->price}} </div>
                        <div class="menu-item-description"> {{$dish->description}} </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
    
@endsection
