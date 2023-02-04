<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Color;
use App\Models\Country;
use App\Models\Shippingcost;
use App\Models\Shippingcostrest;

class ShopController extends Controller
{
    //

    public function savesize(Request $request){

        $size = new Size();
        $size->size_name = $request->input('size_name');

        $size->save();

        return back()->with("status", "The size has been successfully saved !!! ");

    }

    public function editsize($id){

        $size = Size::find($id);
        return view("admin.editsize")->with("size", $size);

    }

    public function updatesize(Request $request, $id){

        $size = Size::find($id);
        $size->size_name = $request->input('size_name');

        $size->update();

        return back()->with("status", "The size has been successfully updated !!! ");

    }

    public function deletesize($id){

        $size = Size::find($id);
        $size->delete();

        return back()->with("status", "The size has been successfully deleted !!! ");
    }

    public function savecolor(Request $request){
        $color = new Color();

        $color->color_name = $request->input('color_name');
        $color->save();

        return back()->with("status", "The color has been successfully saved !!!");
    }

    public function editcolor($id){
        $color = Color::find($id);
        return view("admin.editcolor")->with("color", $color);
    }

    public function updatecolor(Request $request, $id){
        
        $color = Color::find($id);
        $color->color_name = $request->input('color_name');

        $color->update();

        return back()->with("status", "The color has been successfully updated !!!");
    }

    public function deletecolor($id){
        
        $color = Color::find($id);

        $color->delete();

        return back()->with("status", "The color has been successfully deleted !!!");
    }

    public function savecountry(Request $request){

        $country = new Country();

        $country->country_name = $request->input('country_name');
        $country->save();

        return back()->with("status", "The country name has been successfully saved !!! ");
    }

    public function vieweditcountrypage($id){
        $country = Country::find($id);
        return view("admin.editcountry")->with("country", $country);
    }

    public function updatecountry(Request $request, $id){

        $country = Country::find($id);

        $country->country_name = $request->input('country_name');
        $country->update();

        return back()->with("status", "The country name has been successfully udated !!! ");
    }

    public function deletecountry($id){

        $country = Country::find($id);

        $country->delete();

        return back()->with("status", "The country name has been successfully deleted !!! ");

    }

    public function saveshippingcost(Request $request){
        
        $shippingcost = new Shippingcost();
        $shippingcost->country_id = $request->input('country_id');
        $shippingcost->amount = $request->input('amount');

        $shippingcost->save();

        return back()->with("status", "The shipping cost has been successfully saved !!! ");
    }

    public function vieweditshippingcostpage($id){
        $shippingcost = Shippingcost::find($id);
        $countries = Country::where("country_name" ,"!=",  $shippingcost->country_id)->get();
        return view("admin.editshippingcost")->with("shippingcost", $shippingcost)->with("countries", $countries);
    }

    public function updateshippingcost(Request $request, $id){
                
        $shippingcost = Shippingcost::find($id);
        $shippingcost->country_id = $request->input('country_id');
        $shippingcost->amount = $request->input('amount');

        $shippingcost->update();

        return back()->with("status", "The shipping cost has been successfully updated !!! ");

    }

    public function deleteshippingcost($id){
        $shippingcost = Shippingcost::find($id);

        $shippingcost->delete();

        return back()->with("status", "The shipping cost has been successfully deleted !!! ");
    }

    public function saverestamount(Request $request){

        $shippingcostrest = new Shippingcostrest();
        $shippingcostrest->amount = $request->input('amount');

        $shippingcostrest->save();

        return back()->with("status", "The rest of the world amount has been successfully saved !!! ");
    }

    public function updaterestamount(Request $request, $id){

        $shippingcostrest = Shippingcostrest::find($id);
        $shippingcostrest->amount = $request->input('amount');

        $shippingcostrest->update();

        return back()->with("status", "The rest of the world amount has been successfully updated !!! ");

    }

}
