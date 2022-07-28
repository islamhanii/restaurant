@section('gallery')

<!-- Portfolio Section -->
<div id="portfolio">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Gallery</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            @foreach ($gallery->categories as $category)
                            <li><a href="#" data-filter=".{{strtolower($category)}}">{{ucWords($category)}}</a></li>
                            @endforeach
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="portfolio-items">
                @foreach ($gallery as $dish)
                <div class="col-sm-6 col-md-4 col-lg-4 {{strtolower($dish->category->name)}}">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="{{asset("uploads/" . $dish->image)}}" title="{{ucWords($dish->name)}}" data-lightbox-gallery="gallery1">
                                <div class="hover-text">
                                    <h4>{{$dish->name}}</h4>
                                </div>
                                <img src="{{asset("uploads/" . $dish->image)}}" class="img-responsive" alt="Project Title"> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection