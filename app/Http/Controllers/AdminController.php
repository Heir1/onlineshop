<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Coordonate;
use App\Models\Message;
use App\Models\Countproduct;
use App\Models\Homesetting;
use App\Models\Metadonnee;
use App\Models\Featuredproduct;
use App\Models\Latestproduct;
use App\Models\Popularproduct;
use App\Models\Newsletter;
use App\Models\Loginbanner;
use App\Models\Registbanner;
use App\Models\Passwordbanner;
use App\Models\Paymentsetting;
use App\Models\Size;
use App\Models\Color;
use App\Models\Country;
use App\Models\Shippingcost;
use App\Models\Shippingcostrest;

class AdminController extends Controller
{
    //

    public function admindashboard(){
        return view("admin.dashboard");
    }

    public function settings(){

        $logo = Logo::first();
        $favicon = Favicon::first();
        $coordonate = Coordonate::first();
        $message = Message::first();
        $countproduct = Countproduct::first();
        $homesetting = Homesetting::first();
        $metadonnee = Metadonnee::first();
        $featuredproduct = Featuredproduct::first();
        $latestproduct = Latestproduct::first();
        $popularproduct = Popularproduct::first();
        $newsletter = Newsletter::first();
        $loginbanner = Loginbanner::first();
        $registbanner = Registbanner::first();
        $passwordbanner = Passwordbanner::first();
        $paymentsetting = Paymentsetting::first();

        return view("admin.settings")
                    ->with("logo", $logo)
                    ->with("favicon", $favicon)
                    ->with("coordonate", $coordonate)
                    ->with("message",$message)
                    ->with("countproduct",$countproduct)
                    ->with("homesetting", $homesetting)
                    ->with("metadonnee",$metadonnee)
                    ->with("featuredproduct", $featuredproduct)
                    ->with("latestproduct", $latestproduct)
                    ->with("popularproduct", $popularproduct)
                    ->with("newsletter", $newsletter)
                    ->with("loginbanner", $loginbanner)
                    ->with("registbanner", $registbanner)
                    ->with("passwordbanner", $passwordbanner)
                    ->with("paymentsetting", $paymentsetting);
    }

    public function size(){

        $sizes = Size::get();
        $increment = 1;
        return view("admin.size")->with("sizes", $sizes)->with("increment", $increment);

    }

    public function addsize(){
        return view("admin.addsize");
    }

    public function color(){
        $colors = Color::get();
        $increment = 1;
        return view("admin.color")->with("colors", $colors)->with("increment",$increment);
    }

    public function addcolor(){
        return view("admin.addcolor");
    }

    public function viewcountrypage(){
        $countries = Country::get();
        $increment=1;
        return view("admin.country")->with("countries", $countries)->with("increment", $increment);
    }

    public function addcountry(){
        return view("admin.addcountry");
    }

    public function editcountry(){
        return view("admin.editcountry");
    }

    public function shippingcost(){
        $countries = Country::get();
        $shippingcosts = Shippingcost::get();
        $shippingcostrest = Shippingcostrest::first();

        return view("admin.shippingcost")->with("countries",$countries)->with('shippingcosts', $shippingcosts)->with('shippingcostrest', $shippingcostrest);
    }

    // public function editshippingcost(){
    //     return view("admin.editshippingcost");
    // }

    // public function toplevelcategory(){
    //     return view("admin.toplevelcategory");
    // }

    // public function addtoplevelcategory(){
    //     return view("admin.addtoplevelcategory");
    // }

    // public function edittoplevelcategory(){
    //     return view("admin.edittoplevelcategory");
    // }

    // public function midlevelcategory(){
    //     return view("admin.midlevelcategory");
    // }

    // public function addmidlevelcategory(){
    //     return view("admin.addmidlevelcategory");
    // }

    // public function editmidlevelcategory(){
    //     return view("admin.editmidlevelcategory");
    // }

    public function endlevelcategory(){
        return view("admin.endlevelcategory");
    }

    public function addendlevelcategory(){
        return view("admin.addendlevelcategory");
    }

    public function editendlevelcategory(){
        return view("admin.editendlevelcategory");
    }

    public function orders(){
        return view("admin.orders");
    }

    public function sliders(){
        return view("admin.sliders");
    }

    public function addslider(){
        return view("admin.addslider");
    }

    public function editslider(){
        return view("admin.editslider");
    }

    public function services(){
        return view("admin.services");
    }

    public function addservice(){
        return view("admin.addservice");
    }

    public function editservice(){
        return view("admin.editservice");
    }

    public function faq(){
        return view("admin.faq");
    }

    public function addfaq(){
        return view("admin.addfaq");
    }

    public function editfaq(){
        return view("admin.editfaq");
    }

    public function registeredcustomer(){
        return view("admin.registeredcustomer");
    }

    public function pagesettings(){
        return view("admin.pagesettings");
    }

    public function socialmedia(){
        return view("admin.socialmedia");
    }

    public function subscriber(){
        return view("admin.subscriber");
    }

    public function editprofile(){
        return view("admin.editprofile");
    }
}
