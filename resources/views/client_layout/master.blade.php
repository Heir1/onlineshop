<!-- This is main configuration File -->
<!DOCTYPE html>
<html lang="en">
   <head>
        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <!-- Favicon -->
        @include('client_styles.styles')
        <meta name="keywords" content="online fashion store, garments shop, online garments">
        <meta name="description" content="ecommerce php project with mysql database">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>
   </head>
   <body>

    {{-- start header --}}
        @include('client_layout.header')
    {{-- end header --}}

        {{-- start content --}}
            @yield('content')
        {{-- end content --}}

    <!-- start newsletter -->
    <section class="home-newsletter">
        <div class="container">
           <div class="row">
              <div class="col-md-6 col-md-offset-3">
                 <div class="single">
                    <form action="" method="post">
                       <input type="hidden" name="_csrf" value="305e2e05d29f55b50a14ad09db8b623c" />					
                       <h2>Subscribe To Our Newsletter</h2>
                       <div class="input-group">
                          <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email_subscribe">
                          <span class="input-group-btn">
                          <button class="btn btn-theme" type="submit" name="form_subscribe">Subscribe</button>
                          </span>
                       </div>
                 </div>
                 </form>
              </div>
           </div>
        </div>
    </section>
     <!-- end newsletter -->

     <!-- start footer -->
     <div class="footer-bottom">
        <div class="container">
           <div class="row">
              <div class="col-md-12 copyright">
                 Copyright Â© 2022 - Ecommerce Website PHP - Developed By Hammad Hassan			
              </div>
           </div>
        </div>
     </div>
     <!-- end footer -->

     <a href="#" class="scrollup">
     <i class="fa fa-angle-up"></i>
     </a>

    @include('client_scripts.script')

  </body>
</html>