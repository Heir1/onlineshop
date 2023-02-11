<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- start top bar -->
<div class="top">
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="left">
                <ul>
                    <li><i class="fa fa-phone"></i> +001 10 101 0010</li>
                    <li><i class="fa fa-envelope-o"></i> support@ecommercephp.com</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="right">
                <ul>
                    <li><a href="https://www.facebook.com/#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com/#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="https://www.instagram.com/#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.whatsapp.com/#"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- end top bar -->

<!-- start header -->
<div class="header">
    <div class="container">
        <div class="row inner">
        <div class="col-md-4 logo">
            <a href="index.php"><img src="{{asset('frontend/assets/uploads/logo.png')}}" alt="logo image"></a>
        </div>
        <div class="col-md-5 right">
            <ul>
                <li><a href="{{ url('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                <li><a href="{{ url('register')}}"><i class="fa fa-user-plus"></i> Register</a></li>
                <li><a href="{{ url('cart')}}"><i class="fa fa-shopping-cart"></i> Cart ($0.00)</a></li>
            </ul>
        </div>
        <div class="col-md-3 search-area">
            <form class="navbar-form navbar-left" role="search" action="search-result.php" method="get">
                <input type="hidden" name="_csrf" value="305e2e05d29f55b50a14ad09db8b623c" />					
                <div class="form-group">
                    <input type="text" class="form-control search-top" placeholder="Search Product" name="search_text">
                </div>
                <button type="submit" class="btn btn-danger">Search</button>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- start navbar -->
<div class="nav">
    <div class="container">
        <div class="row">
        <div class="col-md-12 pl_0 pr_0">
            <div class="menu-container">
                <div class="menu">
                    <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    @foreach ($toplevelcategories as $toplevelcategory)
                        <li>
                            <a href="{{ url('viewproductbytopcategory', [$toplevelcategory->tcat_name]) }}">{{$toplevelcategory->tcat_name}}</a>

                            <ul>
                                @foreach ($middlelevelcategories as $middlelevelcategory)
                                <li>
                                    @if ($middlelevelcategory->tcat_id == $toplevelcategory->tcat_name)
                                        <a href="{{ url('viewproductbymidcategory', [$toplevelcategory->tcat_name,$middlelevelcategory->mcat_name]) }}">{{$middlelevelcategory->mcat_name}}</a>
                                        <ul>
                                            @foreach ($endlevelcategories as $endlevelcategory)
                                                @if ($endlevelcategory->tcat_id == $toplevelcategory->tcat_name && $endlevelcategory->mcat_id == $middlelevelcategory->mcat_name)
                                                    <li>
                                                        <a href="{{ url('viewproductbyendcategory', [$toplevelcategory->tcat_name,      $middlelevelcategory->mcat_name,$endlevelcategory->ecat_name]) }}">{{$endlevelcategory->ecat_name}} 
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach                    
                    <li><a href="{{url('about')}}">About Us</a></li>
                    <li><a href="{{url('faq')}}">FAQ</a></li>
                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- end navbar -->