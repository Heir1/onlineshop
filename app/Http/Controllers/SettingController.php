<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Logo;
use App\Models\Favicon;

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
}
