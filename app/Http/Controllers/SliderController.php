<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    //

    public function sliders(){

        $sliders = Slider::get();
        $increment = 1;
        return view("admin.sliders")->with("sliders",$sliders)->with("increment",$increment);

    }

    public function addslider(){
        return view("admin.addslider");
    }

    public function saveslider(Request $request){

        $this->validate($request, [
            'photo' => 'image|nullable|max:1999|required', 
            'heading' => 'required|string',
            'content' => 'required|string',
            'buttontext' => 'required|string',
            'buttonurl' => 'required|string',
            'position' => 'required|string',   
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
        $path = $request->file('photo')->storeAs('public/sliderimages', $fileNameToStore);

        $slider = new Slider();

        $slider->photo = $fileNameToStore;
        $slider->heading = $request->input('heading');
        $slider->content = $request->input('content');
        $slider->buttontext = $request->input('buttontext');
        $slider->buttonurl = $request->input('buttonurl');
        $slider->position = $request->input('position');

        $slider->save();

        return redirect("admin/sliders")->with("status", "The product slider has been successfully saved !!!");
    }

    public function editslider($id){
        
        $slider = Slider::find($id);
        return view("admin.editslider")->with("slider",$slider);
    }

    public function updateslider(Request $request, $id){

        $this->validate($request, [
            'heading' => 'required|string',
            'content' => 'required|string',
            'buttontext' => 'required|string',
            'buttonurl' => 'required|string',
            'position' => 'required|string',   
        ]);

        $slider = Slider::find($id);

        if($request->file("photo")){

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

            // 5 ; deleting old slider image
            Storage::delete("public/sliderimages/$slider->photo");

            // 6 : uploading file
            $path = $request->file('photo')->storeAs('public/sliderimages', $fileNameToStore);

            $slider->photo = $fileNameToStore;
        }

        $slider->heading = $request->input('heading');
        $slider->content = $request->input('content');
        $slider->buttontext = $request->input('buttontext');
        $slider->buttonurl = $request->input('buttonurl');
        $slider->position = $request->input('position');

        $slider->update();

        return back()->with("status", "The product slider has been successfully updated !!!");


    }

    public function deleteslider($id){
        
        $slider = Slider::find($id);

        Storage::delete("public/sliderimages/$slider->photo");
        $slider->delete();

        return back()->with("status", "The slider has been successfully deleted !!!");

    }
}
