<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
use App\Models\Service;

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

    public function services(){

        $services = Service::get();
        $increment=1;

        return view("admin.services")->with("services",$services)->with("increment",$increment);

    }

    public function addservice(){
        return view("admin.addservice");
    }

    public function saveservice(Request $request){
        
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',   
            'photo' => 'image|nullable|max:1999|required'
        ]);

        // 1 : file name with extension
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();

        // 2 : file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // 3 : file extension
        $ext = $request->file('photo')->getClientOriginalExtension();
        
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        // 5 : uploading file
        $path = $request->file('photo')->storeAs('public/serviceimages', $fileNameToStore);

        $service = new Service();

        $service->title = $request->input("title");
        $service->content = $request->input("content");
        $service->photo = $fileNameToStore;

        $service->save();

        return redirect("admin/services")->with("status", "The service has been successfully saved !!!");

    }

    public function editservice($id){

        $service = Service::find($id);
        return view("admin.editservice")->with("service",$service);
    }

    public function updateservice(Request $request, $id){
        
        $this->validate($request, [
            'title' => 'required|string',
            'content' => 'required|string',   
        ]);

        $service = Service::find($id);

        if ($request->file('photo')) {
            # code...
            $this->validate($request, [   
                'photo' => 'image|nullable|max:1999|required'
            ]);

            // 1 : file name with extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
    
            // 2 : file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    
            // 3 : file extension
            $ext = $request->file('photo')->getClientOriginalExtension();
            
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;
            
            // 5 removing old image
            Storage::delete("public/serviceimages/$service->photo");

            // 6 : uploading file
            $path = $request->file('photo')->storeAs('public/serviceimages', $fileNameToStore);

            $service->photo = $fileNameToStore;

        }

        $service->title = $request->input("title");
        $service->content = $request->input("content");

        $service->update();

        return back()->with("status", "The service has been successfully updated !!!");

    }

    public function deleteservice($id){
        
        $service = Service::find($id);
        Storage::delete("public/serviceimages/$service->photo");

        $service->delete();

        return back()->with("status", "The service has been successfully deleted !!! ");
        
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
