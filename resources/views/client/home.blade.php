@extends('client_layout.master')

@section('title')
    Home
@endsection

@section('content')
    
    <!-- ********************* start content ******************** -->

    <!-- start sliders -->
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach ($sliders as $slider)
            <li data-target="#bootstrap-touch-slider" class="{{$increment == 0 ? 'active' : ''}}" data-slide-to="{{$increment++}}"></li>
        @endforeach
        {{-- <li data-target="#bootstrap-touch-slider" data-slide-to="1" ></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="2" ></li> --}}
    </ol>
    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
        @foreach ($sliders as $slider)
            <div class="item {{$increment1 == 0 ? 'active' : ''}}" style="background-image:url({{asset('/storage/sliderimages/'.$slider->photo)}});">
                <div class="bs-slider-overlay"></div>
                <div class="container">
                    <div class="row">
                    <div class="slide-text slide_style_{{strtolower($slider->position)}}">
                        <h1 data-animation="animated flipInX">{{$slider->heading}}</h1>
                        <p data-animation="animated {{strtolower($slider->position) == "center" ? "fadeInDown" : (strtolower($slider->position) == "right" ? "fadeInRight" : "fadeInLeft") }} ">{{$slider->content}}</p>
                        <a href="product-category.php?id=4&type=mid-category" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">{{$slider->buttontext}}</a>
                    </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{$increment1++}}">
        @endforeach
    </div>
    <!-- Slider Left Control -->
    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
    <span class="fa fa-angle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <!-- Slider Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
    <span class="fa fa-angle-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
    <!-- end sliders -->

    <!-- start services -->
    <div class="service bg-gray">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="item">
                    <div class="photo"><img src="{{asset('/storage/serviceimages/'.$service->photo)}}" width="150px" alt="Easy Returns"></div>
                    <h3>{{$service->title}}</h3>
                    <p>
                        {{$service->content}}                            
                    </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    <!-- end services -->

    <!-- start featured products -->
    <div class="product pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                <h2>Featured Products</h2>
                <h3>Our list on Top Featured Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel">
                    @foreach ($featuredproducts as $product)
                        <div class="item">
                            <div class="thumb">
                                <div class="photo" style="background-image:url({{asset('/storage/productimages/'.$product->p_featured_photo)}});"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="{{ url('viewproductdatails', [$product->id]) }}">{{$product->p_name}}</a></h3>
                                <h4>
                                    ${{$product->p_current_price}} 
                                    <del> $      {{$product->p_old_price}}                                    
                                    </del>
                                </h4>
                                <div class="rating">
                                </div>
                                <p><a href="{{ url('viewproductdatails', [$product->id]) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end featured products -->

    <!-- start lastest products -->
    <div class="product bg-gray pt_70 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                <h2>Latest Products</h2>
                <h3>Our list of recently added products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel">
                    @foreach ($latestproducts as $product)
                        <div class="item">
                            <div class="thumb">
                                <div class="photo" style="background-image:url({{asset('/storage/productimages/'.$product->p_featured_photo)}});"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="{{ url('viewproductdatails', [$product->id]) }}">{{$product->p_name}}</a></h3>
                                <h4>
                                    ${{$product->p_current_price}} 
                                    <del> $      {{$product->p_old_price}}                                    
                                    </del>
                                </h4>
                                <div class="rating">
                                </div>
                                <p><a href="{{ url('viewproductdatails', [$product->id]) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end lastest products -->

    <!-- start popular products -->
    <div class="product pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                <h2>Popular Products</h2>
                <h3>Popular products based on customer's choice</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel">
                    @foreach ($popularproducts as $product)
                        <div class="item">
                            <div class="thumb">
                                <div class="photo" style="background-image:url({{asset('/storage/productimages/'.$product->p_featured_photo)}});"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="{{ url('viewproductdatails', [$product->id]) }}">{{$product->p_name}}</a></h3>
                                <h4>
                                    ${{$product->p_current_price}} 
                                    <del> $      {{$product->p_old_price}}                                    
                                    </del>
                                </h4>
                                <div class="rating">
                                </div>
                                <p><a href="{{ url('viewproductdatails', [$product->id]) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end popular products -->

    <!-- ********************** end content ******************** -->

@endsection

