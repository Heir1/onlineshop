<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Logo;

class SettingController extends Controller
{
    //
    public function updatelogo(Request $request){

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

        return back()->with("status", "The logo image is updated successfully.");

    }
}
