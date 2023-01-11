<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Favicon;
use App\Models\Coordonate;
use App\Models\Message;
use App\Models\Countproduct;

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

        return view("admin.settings")->with("logo", $logo)->with("favicon", $favicon)->with("coordonate", $coordonate)->with("message",$message)->with("countproduct",$countproduct);
    }

    public function size(){
        return view("admin.size");
    }

    public function addsize(){
        return view("admin.addsize");
    }

    public function editsize(){
        return view("admin.editsize");
    }

    public function color(){
        return view("admin.color");
    }

    public function addcolor(){
        return view("admin.addcolor");
    }

    public function editcolor(){
        return view("admin.editcolor");
    }

    public function country(){
        return view("admin.country");
    }

    public function addcountry(){
        return view("admin.addcountry");
    }

    public function editcountry(){
        return view("admin.editcountry");
    }

    public function shippingcost(){
        return view("admin.shippingcost");
    }

    public function editshippingcost(){
        return view("admin.editshippingcost");
    }

    public function toplevelcategory(){
        return view("admin.toplevelcategory");
    }

    public function addtoplevelcategory(){
        return view("admin.addtoplevelcategory");
    }

    public function edittoplevelcategory(){
        return view("admin.edittoplevelcategory");
    }

    public function midlevelcategory(){
        return view("admin.midlevelcategory");
    }

    public function addmidlevelcategory(){
        return view("admin.addmidlevelcategory");
    }

    public function editmidlevelcategory(){
        return view("admin.editmidlevelcategory");
    }

    public function endlevelcategory(){
        return view("admin.endlevelcategory");
    }

    public function addendlevelcategory(){
        return view("admin.addendlevelcategory");
    }

    public function editendlevelcategory(){
        return view("admin.editendlevelcategory");
    }

    public function products(){
        return view("admin.products");
    }

    public function addproduct(){
        return view("admin.addproduct");
    }

    public function editproduct(){
        return view("admin.editproduct");
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
