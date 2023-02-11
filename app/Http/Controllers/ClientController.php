<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Product;
use App\Models\Countproduct;
use App\Models\Toplevelcategory;
use App\Models\Loginbanner;

class ClientController extends Controller
{
    //

    public function homepage(){

        $sliders = Slider::get();
        $services = Service::get();
        $countproduct = Countproduct::first();
        $featuredproducts = Product::limit($countproduct->total_featured_product_home)->get();
        $latestproducts = Product::limit($countproduct->total_latest_product_home)->orderBy("created_at","desc")->get();
        $popularproducts = Product::limit($countproduct->total_popular_product_home)->orderBy("soldqty","desc")->get();
        
        // 
        // 

        $increment = 0;
        $increment1 = 0;

        return view("client.home")->with("sliders",$sliders)->with("services",$services)->with("featuredproducts",$featuredproducts)->with("latestproducts",$latestproducts)->with("popularproducts",$popularproducts)->with("increment",$increment)->with("increment1",$increment1);
    }

    public function about(){
        return view("client.about");
    }

    public function faq(){
        return view("client.faq");
    }

    public function contact(){
        return view("client.contact");
    }

    public function login(){
        return view("client.login");
    }

    public function register(){
        return view("client.registration");
    }

    public function cart(){
        return view("client.cart");
    }

    public function checkout(){
        return view("client.checkout");
    }

    public function dashboard(){
        return view("client.dashboard");
    }

    public function profile(){
        return view("client.profile");
    }

    public function billingdetails(){
        return view("client.billingdetails");
    }

    public function viewpassword(){
        return view("client.viewpasswordfields");
    }

    public function customersorders(){
        return view("client.customerorder");
    }

    public function viewproductbytopcategory($tcatname){

        $products = Product::where("tcat_id",$tcatname)->get();
        
        $banner = Loginbanner::first();

        return view("client.viewproductbycategory")->with("products",$products)->with("category",$tcatname)->with("banner",$banner);

    }
    
    public function viewproductbymidcategory($tcatname,$mcatname){

        $products = Product::where("tcat_id",$tcatname)->where("mcat_id",$mcatname)->get();
        
        $banner = Loginbanner::first();

        return view("client.viewproductbycategory")->with("products",$products)->with("category",$mcatname)->with("banner",$banner);

    }

    public function viewproductbyendcategory($tcatname,$mcatname,$ecatname){

        $products = Product::where("tcat_id",$tcatname)->where("mcat_id",$mcatname)->where("ecat_id",$ecatname)->get();
        
        $banner = Loginbanner::first();

        return view("client.viewproductbycategory")->with("products",$products)->with("category",$ecatname)->with("banner",$banner);

    }

    public function viewproductdatails($id){

        $product = Product::find($id);
        $increment = 1;

        $selectedsizes = explode("*",$product->size);
        array_pop($selectedsizes);

        $selectedcolors = explode("*",$product->color);
        array_pop($selectedcolors);

        $selectedphotos = explode("*",$product->photo);
        array_pop($selectedphotos);

        return view("client.viewproductdetails")->with("product",$product)->with("selectedsizes",$selectedsizes)->with("selectedcolors",$selectedcolors)->with("selectedphotos",$selectedphotos)->with("increment",$increment);
    }

    public function searchproduct(){
        return view("client.searchproduct");
    }
}
