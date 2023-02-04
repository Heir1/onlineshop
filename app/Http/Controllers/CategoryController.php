<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toplevelcategory;
use App\Models\Middlelevelcategory;
use App\Models\Endlevelcategory;

class CategoryController extends Controller
{
    //

    public function viewtoplevelcategorypage(){

        $toplevelcategories = Toplevelcategory::get();
        $increment = 1;

        return view("admin.toplevelcategory")->with('toplevelcategories', $toplevelcategories)->with("increment", $increment);
    }

    public function viewaddtoplevelcategorypage(){
        return view("admin.addtoplevelcategory");
    }

    public function savetoplevelcategory(Request $request){
        
        $this->validate($request, [
            'tcat_name' => 'required',
            'show_on_menu' => 'required'
        ]);

        $toplevelcategory = new Toplevelcategory();
        $toplevelcategory->tcat_name = $request->input('tcat_name');
        $toplevelcategory->show_on_menu = $request->input('show_on_menu');

        $toplevelcategory->save();
     
        return back()->with("status", "The top level ctegory has been successfully saved !!! ");
    }

    public function updatetoplevelcategory(Request $request, $id){
        $this->validate($request, [
            'tcat_name' => 'required',
            'show_on_menu' => 'required'
        ]);

        $toplevelcategory = Toplevelcategory::find($id);
        $toplevelcategory->tcat_name = $request->input('tcat_name');
        $toplevelcategory->show_on_menu = $request->input('show_on_menu');

        $toplevelcategory->update();
     
        return back()->with("status", "The top level ctegory has been successfully updated !!! ");
    }

    public function deletetoplevelcategory($id){
        
        $toplevelcategory = Toplevelcategory::find($id);
        $toplevelcategory->delete();
     
        return back()->with("status", "The top level ctegory has been successfully deleted !!! ");
    }

    public function viewedittoplevelcategorypage($id){

        $toplevelcategory = Toplevelcategory::find($id);
        return view("admin.edittoplevelcategory")->with('toplevelcategory', $toplevelcategory);

    }

    public function viewmidlevelcategorypage(){

        $middlelevelcategories = Middlelevelcategory::get();
        $increment = 1;

        return view("admin.midlevelcategory")->with('middlelevelcategories', $middlelevelcategories)->with("increment", $increment);
    }

    public function viewaddmidlevelcategorypage(){
        $toplevelcategories = Toplevelcategory::get();
        $increment = 1;

        return view("admin.addmidlevelcategory")->with('toplevelcategories', $toplevelcategories)->with("increment", $increment);
    }

    public function savemiddlecategory(Request $request){

        $middlelevelcategory = new Middlelevelcategory();
        $middlelevelcategory->tcat_id  = $request->input('tcat_id');
        $middlelevelcategory->mcat_name  = $request->input('mcat_name');  
        
        $middlelevelcategory->save();

        return back()->with("status", "The middle level ctegory has been successfully saved !!! ");

    }

    public function vieweditmidlevelcategorypage($id){

        $middlelevelcategory = Middlelevelcategory::find($id);
        $toplevelcategories = Toplevelcategory::where('tcat_name', '!=', $middlelevelcategory->tcat_id)->get();

        return view("admin.editmidlevelcategory")->with('middlelevelcategory', $middlelevelcategory)->with("toplevelcategories", $toplevelcategories);
    }
    
    public function updatemiddlelevelcategory(Request $request, $id){
        
        $middlelevelcategory = Middlelevelcategory::find($id);
        $middlelevelcategory->tcat_id  = $request->input('tcat_id');
        $middlelevelcategory->mcat_name  = $request->input('mcat_name');  
        
        $middlelevelcategory->update();

        return back()->with("status", "The middle level ctegory has been successfully updated !!! ");

    }

    public function deletemiddlelevelcategory($id){
        
        $middlelevelcategory = Middlelevelcategory::find($id);
        $middlelevelcategory->delete();

        return back()->with("status", "The middle level ctegory has been successfully deleted !!! ");
    }


    public function viewendlevelcategorypage(){

        $endlevelcategories = Endlevelcategory::get();
        $increment = 1;

        return view("admin.endlevelcategory")->with("endlevelcategories",$endlevelcategories)->with("increment",$increment);

    }

    public function viewaddendlevelcategorypage(){

        $toplevelcategories = Toplevelcategory::get();
        $middlelevelcategories = Middlelevelcategory::get();

        return view("admin.addendlevelcategory")->with("toplevelcategories",$toplevelcategories)->with("middlelevelcategories",$middlelevelcategories);

    }

    public function saveendlevelcategory(Request $request){
        
        $endlevelcategory = new Endlevelcategory();

        $endlevelcategory->tcat_id = $request->input("tcat_id");
        $endlevelcategory->mcat_id = $request->input("mcat_id");
        $endlevelcategory->ecat_name = $request->input("ecat_name");

        $endlevelcategory->save();

        return back()->with("status", "The end level category has been successfully saved !!! ");

    }

    public function vieweditendlevelcategorypage($id){
        
        $endlevelcategory = Endlevelcategory::find($id);

        $toplevelcategories = Toplevelcategory::where("tcat_name", "!=", $endlevelcategory->tcat_id)->get();

        $middlelevelcategories = Middlelevelcategory::where("mcat_name", "!=", $endlevelcategory->mcat_id)->get();
        
        return view("admin.editendlevelcategory")->with("toplevelcategories",$toplevelcategories)->with("middlelevelcategories",$middlelevelcategories)->with("endlevelcategory",$endlevelcategory);

    }

    public function updateendlevelcategory(Request $request, $id){

        $endlevelcategory = Endlevelcategory::find($id);

        $endlevelcategory->tcat_id = $request->input("tcat_id");
        $endlevelcategory->mcat_id = $request->input("mcat_id");
        $endlevelcategory->ecat_name = $request->input("ecat_name");

        $endlevelcategory->update();

        return back()->with("status", "The end level category has been successfully updated !!! ");

    }

    public function deleteendlevelcategory($id){

        $endlevelcategory = Endlevelcategory::find($id);
        $endlevelcategory->delete();
        
        return back()->with("status", "The end level category has been successfully deleted !!! ");

    }
}
