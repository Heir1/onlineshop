@extends('client_layout.master')

@section('title')
    View product by category
@endsection

@section('content')
    <!-- ********************** start content ********************** -->

    <!-- start banner -->
    <div class="page-banner" style="background-image: url({{asset('/storage/banners/'.$banner->photo)}})">
        <div class="inner">
           <h1>Category: {{$category}}</h1>
        </div>
    </div>
     <!-- end banner -->

    <!-- start page content -->
    @php
      $increment=1;
      $increment1=1; 
      $increment2=1;
    @endphp
    <div class="page">
        <div class="container">
           <div class="row">
              <div class="col-md-3">
                 <h3>Categories</h3>
                 <div id="left" class="span3">
                    <ul id="menu-group-1" class="nav menu">
                     @foreach ($toplevelcategories as $toplevelcategory)
                       <li class="cat-level-1 deeper parent">
                          <a class="" href="{{ url('viewproductbytopcategory', [$toplevelcategory->tcat_name]) }}">
                          <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl1-id-{{$increment}}" class="sign"><i class="fa fa-plus"></i></span>
                          <span class="lbl">{{$toplevelcategory->tcat_name}}</span>                      
                          </a>
                          <ul class="children nav-child unstyled small collapse" id="cat-lvl1-id-{{$increment}}">
                           @foreach ($middlelevelcategories as $middlelevelcategory)
                             <li class="deeper parent">
                              @if ($middlelevelcategory->tcat_id == $toplevelcategory->tcat_name)
                                <a class="" href="{{ url('viewproductbymidcategory', [$toplevelcategory->tcat_name,$middlelevelcategory->mcat_name]) }}">
                                <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl2-id-{{$increment1}}" class="sign"><i class="fa fa-plus"></i></span>
                                <span class="lbl lbl1">{{$middlelevelcategory->mcat_name}}</span> 
                                </a>
                                <ul class="children nav-child unstyled small collapse" id="cat-lvl2-id-{{$increment1}}">
                                    @php
                                        $count=0;
                                    @endphp
                                   @foreach ($endlevelcategories as $endlevelcategory)
                                   @if ($endlevelcategory->tcat_id == $toplevelcategory->tcat_name && $endlevelcategory->mcat_id == $middlelevelcategory->mcat_name)
                                       <li class="item-{{$increment2}}">
                                           <a href="{{ url('viewproductbyendcategory', [$toplevelcategory->tcat_name,      $middlelevelcategory->mcat_name,$endlevelcategory->ecat_name]) }}">
                                             <span class="sign"></span>
                                             <span class="lbl lbl1">{{$endlevelcategory->ecat_name}}</span> 
                                           </a>
                                       </li>
                                       @php
                                          $increment2++;
                                          $count++;
                                       @endphp
                                    @endif
                                 @endforeach
                                    @php
                                      $increment1++
                                    @endphp
                                 </ul>
                                 @endif
                             </li>
                           @endforeach
                             @php
                                $increment = $increment+1;
                             @endphp
                          </ul>
                       </li>
                     @endforeach
                    </ul>
                 </div>
              </div>
              <div class="col-md-9">
                 <h3>All Products Under "{{$category}}"</h3>
                 <div class="product product-cat">
                    <div class="row">
                     @if ($products != "[]")
                        @foreach ($products as $product)
                           <div class="col-md-4 item item-product-cat">
                              <div class="inner">
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
                           </div>
                        @endforeach 
                     @else
                        <div class="pl_15">No Product Found</div>                     
                     @endif
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
    <!-- end page content -->

    <!-- ********************** end content ********************** -->
@endsection