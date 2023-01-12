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


class SettingController extends Controller
{
    //
    public function savelogo(Request $request){

        $this->validate($request, [
            'photo_logo' => 'image|nullable|max:1999|required'
        ]);

        // 1 : file name with extension
        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();

        // 2 : file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // 3 : file extension
        $ext = $request->file('photo_logo')->getClientOriginalExtension();
        
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        // 5 : uploading file
        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        $logo = new Logo();
        $logo->logo = $fileNameToStore;

        $logo->save();

        return back()->with("status", "The logo image is saved successfully.");

    }

    public function updatelogo(Request $request, $id){

        $this->validate($request, [
            'photo_logo' => 'image|nullable|max:1999|required'
        ]);

        $logo = Logo::find($id);

        // 1 : file name with extension
        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();

        // 2 : file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // 3 : file extension
        $ext = $request->file('photo_logo')->getClientOriginalExtension();
        
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        // 5 : deleting old image
        Storage::delete("public/logoimage/$logo->logo");

        // 6 : uploading file
        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        $logo->logo = $fileNameToStore;

        $logo->update();

        return back()->with("status", "The logo image is updated successfully.");

    }

    public function savefavicon(Request $request){

        $this->validate($request, [
            'photo_favicon' => 'image|nullable|max:1999|required'
        ]);

        // 1 : file name with extension
        $fileNameWithExt = $request->file('photo_favicon')->getClientOriginalName();

        // 2 : file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // 3 : file extension
        $ext = $request->file('photo_favicon')->getClientOriginalExtension();
        
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        // 5 : uploading file
        $path = $request->file('photo_favicon')->storeAs('public/logoimage', $fileNameToStore);

        $favicon = new Favicon();

        $favicon->photo_favicon = $fileNameToStore;

        $favicon->save();

        return back()->with("status", "The favicon image is saved successfully.");

    }

    public function updatefavicon(Request $request, $id){

        $this->validate($request, [
            'photo_favicon' => 'image|nullable|max:1999|required'
        ]);

        $favicon = Favicon::find($id);

        // 1 : file name with extension
        $fileNameWithExt = $request->file('photo_favicon')->getClientOriginalName();

        // 2 : file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // 3 : file extension
        $ext = $request->file('photo_favicon')->getClientOriginalExtension();
        
        // 4 : file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;

        // 5 : deleting old image
        Storage::delete("public/logoimage/$favicon->photo_favicon");

        // 6 : uploading file
        $path = $request->file('photo_favicon')->storeAs('public/logoimage', $fileNameToStore);

        $favicon->photo_favicon = $fileNameToStore;

        $favicon->update();

        return back()->with("status", "The favicon image is updated successfully.");       
    }

    public function savecoordonate(Request $request){

        $coordonate = new Coordonate();

        $coordonate->newsletter = $request->input('newsletter_on_off');
        $coordonate->footercopyright = $request->input('footer_copyright');
        $coordonate->contactaddress = $request->input('contact_address');
        $coordonate->contactemail = $request->input('contact_email');
        $coordonate->contactphone = $request->input('contact_phone');
        $coordonate->contactmap = $request->input('contact_map_iframe');

        $coordonate->save();
        return back()->with("status", "The contact and footer has been successfully saved !!");
    }

    public function updatecoordonate(Request $request, $id){

        $coordonate = Coordonate::find($id);

        $coordonate->newsletter = $request->input('newsletter_on_off');
        $coordonate->footercopyright = $request->input('footer_copyright');
        $coordonate->contactaddress = $request->input('contact_address');
        $coordonate->contactemail = $request->input('contact_email');
        $coordonate->contactphone = $request->input('contact_phone');
        $coordonate->contactmap = $request->input('contact_map_iframe');

        $coordonate->update();

        return back()->with("status", "The contact and footer has been successfully updated !!");
    }

    public function savemessage(Request $request){

        $message = new Message();

        $message->receive_email = $request->input('receive_email');
        $message->receive_email_subject = $request->input('receive_email_subject');
        $message->receive_email_thank_you_message = $request->input('receive_email_thank_you_message');
        $message->forget_password_message = $request->input('forget_password_message');

        $message->save();

        return back()->with("status", "The messages have been successfully saved !!");
    }

    public function updatemessage(Request $request, $id){
        
        $message = Message::find($id);

        $message->receive_email = $request->input('receive_email');
        $message->receive_email_subject = $request->input('receive_email_subject');
        $message->receive_email_thank_you_message = $request->input('receive_email_thank_you_message');
        $message->forget_password_message = $request->input('forget_password_message');

        $message->update();

        return back()->with("status", "The messages have been successfully updated !!");

    }

    public function savecountproduct(Request $request){

        $countproduct = new Countproduct();

        $countproduct->total_featured_product_home = $request->input('total_featured_product_home');
        $countproduct->total_latest_product_home = $request->input('total_latest_product_home');
        $countproduct->total_popular_product_home = $request->input('total_popular_product_home');

        $countproduct->save();

        return back()->with("status", "The count products featured have been successfully saved !!");
    }

    public function updatecountproduct(Request $request, $id){
        
        $countproduct = Countproduct::find($id);

        $countproduct->total_featured_product_home = $request->input('total_featured_product_home');
        $countproduct->total_latest_product_home = $request->input('total_latest_product_home');
        $countproduct->total_popular_product_home = $request->input('total_popular_product_home');

        $countproduct->update();

        return back()->with("status", "The count products featured have been successfully updated !!");
    }

    public function savehomesetting(Request $request){
        
        $homesetting = new homeSetting();

        $homesetting->home_service_on_off = $request->input('home_service_on_off');
        $homesetting->home_welcome_on_off = $request->input('home_welcome_on_off');
        $homesetting->home_featured_product_on_off = $request->input('home_featured_product_on_off');
        $homesetting->home_latest_product_on_off = $request->input('home_latest_product_on_off');
        $homesetting->home_popular_product_on_off = $request->input('home_popular_product_on_off');

        $homesetting->save();

        return back()->with("status", "The home setting has been successfully saved !!");

    }

    public function updatehomesetting(Request $request, $id){
        
        $homesetting = homeSetting::find($id);

        $homesetting->home_service_on_off = $request->input('home_service_on_off');
        $homesetting->home_welcome_on_off = $request->input('home_welcome_on_off');
        $homesetting->home_featured_product_on_off = $request->input('home_featured_product_on_off');
        $homesetting->home_latest_product_on_off = $request->input('home_latest_product_on_off');
        $homesetting->home_popular_product_on_off = $request->input('home_popular_product_on_off');

        $homesetting->update();

        return back()->with("status", "The home setting has been successfully updated !!");

    }

    public function savemetadonnee(Request $request){

        $metadonnee = new Metadonnee();

        $metadonnee->meta_title_home = $request->input('meta_title_home');
        $metadonnee->meta_keyword_home = $request->input('meta_keyword_home');
        $metadonnee->meta_description_home = $request->input('meta_description_home');

        $metadonnee->save();

        return back()->with("status", "The metadonnee has been successfully saved !!");

    }

    public function updatemetadonnee(Request $request, $id){

        $metadonnee = Metadonnee::find($id);

        $metadonnee->meta_title_home = $request->input('meta_title_home');
        $metadonnee->meta_keyword_home = $request->input('meta_keyword_home');
        $metadonnee->meta_description_home = $request->input('meta_description_home');

        $metadonnee->update();

        return back()->with("status", "The metadonnee has been successfully updated !!");

    }

    public function savefeaturedproduct(Request $request){

        $featuredproduct = new Featuredproduct();

        $featuredproduct->featured_product_title = $request->input('featured_product_title');
        $featuredproduct->featured_product_subtitle = $request->input('featured_product_subtitle');

        $featuredproduct->save();

        return back()->with("status", "The featured product has been successfully saved !!");

    }

    public function updatefeaturedproduct(Request $request, $id){

        $featuredproduct = Featuredproduct::find($id);

        $featuredproduct->featured_product_title = $request->input('featured_product_title');
        $featuredproduct->featured_product_subtitle = $request->input('featured_product_subtitle');

        $featuredproduct->update();

        return back()->with("status", "The featured product has been successfully updated !!");

    }

    public function savelatestproduct(Request $request){

        $latestproduct = new Latestproduct();

        $latestproduct->latest_product_title = $request->input('latest_product_title');
        $latestproduct->latest_product_subtitle = $request->input('latest_product_subtitle');

        $latestproduct->save();

        return back()->with("status", "The latest product has been successfully saved !!");

    }

    public function updatelatestproduct(Request $request, $id){
        
        $latestproduct = Latestproduct::find($id);

        $latestproduct->latest_product_title = $request->input('latest_product_title');
        $latestproduct->latest_product_subtitle = $request->input('latest_product_subtitle');

        $latestproduct->update();

        return back()->with("status", "The latest product has been successfully updated !!");

    }

    public function savepopularproduct(Request $request){
        
        $popularproduct = new Popularproduct();
        
        $popularproduct->popular_product_title = $request->input('popular_product_title');
        $popularproduct->popular_product_subtitle = $request->input('popular_product_subtitle');

        $popularproduct->save();

        return back()->with("status", "The popular product has been successfully saved !!");

    }

    public function updatepopularproduct(Request $request, $id){
               
        $popularproduct = Popularproduct::find($id);
        
        $popularproduct->popular_product_title = $request->input('popular_product_title');
        $popularproduct->popular_product_subtitle = $request->input('popular_product_subtitle');

        $popularproduct->update();

        return back()->with("status", "The popular product has been successfully updated !!");

    }

    public function savenewsletter(Request $request){
        
        $newsletter = new Newsletter();
        $newsletter->newsletter_text = $request->input('newsletter_text');

        $newsletter->save();

        return back()->with("status", "The newsletter has been successfully saved !!");

    }

    public function updatenewsletter(Request $request, $id){

        $newsletter = Newsletter::find($id);
        $newsletter->newsletter_text = $request->input('newsletter_text');

        $newsletter->update();

        return back()->with("status", "The newsletter has been successfully updated !!");

    }


}
