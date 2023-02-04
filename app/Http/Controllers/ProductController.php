<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Toplevelcategory;
use App\Models\Middlelevelcategory;
use App\Models\Endlevelcategory;
use App\Models\Size;
use App\Models\Color;

class ProductController extends Controller
{
    //
    
    public function viewproducts(){
        $products = Product::get();
        $increment = 1;
        return view("admin.products")->with("products",$products)->with("increment",$increment);
    }

    public function viewaddproductpage(){

        $toplevelcategories = Toplevelcategory::get();
        $middlelevelcategories = Middlelevelcategory::get();
        $endlevelcategories = Endlevelcategory::get();
        $sizes = Size::get();
        $colors = Color::get();

        return view("admin.addproduct")->with("toplevelcategories",$toplevelcategories)->with("middlelevelcategories",$middlelevelcategories)->with("endlevelcategories",$endlevelcategories)->with("sizes",$sizes)->with("colors",$colors);
    }

    public function saveproduct(Request $request){

        $this->validate($request, [
            'tcat_id' => 'string|required',
            'mcat_id' => 'string|required',
            'ecat_id' => 'string|required',
            'p_name' => 'string|required',
            'p_old_price' => 'integer|required',
            'p_current_price' => 'integer|required',
            'p_qty' => 'integer|required',
            'p_featured_photo' => 'image|nullable|max:1999|required',
            'photo' => 'array|required',
            'photo.*' => 'image|nullable|max:1999|required',
            'size' => 'array|required',
            'size.*' => 'string|required|distinct',
            'color' => 'array|required',
            'color.*' => 'string|required|distinct',
            'p_description' => 'string|required',
            'p_short_description' => 'string|required',
            'p_feature' => 'string|required',
            'p_condition' => 'string|required',
            'p_return_policy' => 'string|required',
            'p_is_featured' => 'integer|required',
            'p_is_active' => 'integer|required',    
        ]);

        $imagesdata = "";
        $sizes = $request->input('size'); 
        $colors = $request->input('color');
        $photos = $request->file("photo");
        $sizedata = "";
        $colordata = "";
        $increment=0;

        # getting sizes
        foreach ($sizes as $size) {
            # code...
            $sizedata = $sizedata.$size."*";
        }

        # getting colors
        foreach ($colors as $color) {
            # code...
            $colordata = $colordata.$color."*";
        }

        # getting photos
        foreach ($photos as $photo) {
            // 1 : file name with extension
            $fileNameWithExt = $photo->getClientOriginalName();

            // 2 : file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3 : file extension
            $ext = $photo->getClientOriginalExtension();
            
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().$increment.'.'.$ext;
            
            $imagesdata = $imagesdata.$fileNameToStore."*";
            
            // 5 : uploading file
            $path = $photo->storeAs('public/productimages', $fileNameToStore);
            $increment++;
        } 

        // 1 : file name with extension
        $fileNameWithExt = $request->file('p_featured_photo')->getClientOriginalName();

        // 2 : file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        // 3 : file extension
        $ext = $request->file('p_featured_photo')->getClientOriginalExtension();
        
        // 4 : file name to store
        $fileNameToStore1 = $fileName.'_'.time().'.'.$ext;

        // 5 : uploading file
        $path = $request->file('p_featured_photo')->storeAs('public/productimages', $fileNameToStore1);

        $product = new Product();
        $product->tcat_id = $request->input('tcat_id');
        $product->mcat_id = $request->input('mcat_id');
        $product->ecat_id = $request->input('ecat_id');
        $product->p_name = $request->input('p_name');
        $product->p_old_price = $request->input('p_old_price');
        $product->p_current_price = $request->input('p_current_price');
        $product->p_featured_photo = $fileNameToStore1;
        $product->photo = $imagesdata;
        $product->p_qty = $request->input('p_qty');
        $product->size = $sizedata;
        $product->color = $colordata;
        $product->p_description = $request->input('p_description');
        $product->p_short_description = $request->input('p_short_description');
        $product->p_feature = $request->input('p_feature');
        $product->p_condition = $request->input('p_condition');
        $product->p_return_policy = $request->input('p_return_policy');
        $product->p_is_featured = $request->input('p_is_featured');
        $product->p_is_active = $request->input('p_is_active');

        $product->save();

        return back()->with("status", "The product has been successfully saved .");

    }

    public function vieweditproductpage($id){
        
        $product = Product::find($id);

        $toplevelcategories = Toplevelcategory::where("tcat_name", "!=", $product->tcat_id)->get();

        $middlelevelcategories = Middlelevelcategory::where("mcat_name", "!=", $product->mcat_id)->get();

        $endlevelcategories = Endlevelcategory::where("ecat_name", "!=", $product->ecat_id)->get();

        $sizes = Size::where("size_name", "!=", $product->size)->get();
        $colors = Color::where("color_name", "!=", $product->color)->get();

        $selectedsizes = explode("*",$product->size);
        array_pop($selectedsizes);

        $selectedcolors = explode("*",$product->color);
        array_pop($selectedcolors);

        $selectedphotos = explode("*",$product->photo);
        array_pop($selectedphotos);

        return view("admin.editproduct")->with("product",$product)->with("toplevelcategories",$toplevelcategories)->with("middlelevelcategories",$middlelevelcategories)->with("endlevelcategories",$endlevelcategories)->with("sizes",$sizes)->with("colors",$colors)->with("selectedsizes",$selectedsizes)->with("selectedcolors",$selectedcolors)->with("selectedphotos",$selectedphotos);

    }

    public function updateproduct(Request $request, $id){

        $this->validate($request, [
            'mcat_id' => 'string|required',
            'ecat_id' => 'string|required',
            'p_name' => 'string|required',
            'p_old_price' => 'integer|required',
            'p_current_price' => 'integer|required',
            'p_qty' => 'integer|required',
            'size' => 'array|required',
            'size.*' => 'string|required|distinct',
            'color' => 'array|required',
            'color.*' => 'string|required|distinct',
            'p_description' => 'string|required',
            'p_short_description' => 'string|required',
            'p_feature' => 'string|required',
            'p_condition' => 'string|required',
            'p_return_policy' => 'string|required',
            'p_is_featured' => 'integer|required',
            'p_is_active' => 'integer|required',
        ]);

        $product = Product::find($id);

        if($request->file('p_featured_photo')){

            $this->validate($request, [
                'p_featured_photo' => 'image|nullable|max:1999'
            ]);

            // 1 : file name with extension
            $fileNameWithExt = $request->file('p_featured_photo')->getClientOriginalName();

            // 2 : file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3 : file extension
            $ext = $request->file('p_featured_photo')->getClientOriginalExtension();
            
            // 4 : file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;

            // 5 : deleting old image
            Storage::delete("public/productimages/$product->p_featured_photo");

            // 6 : uploading file
            $path = $request->file('p_featured_photo')->storeAs('public/productimages', $fileNameToStore);

            $product->p_featured_photo = $fileNameToStore;

        }

        $imagesdata = "";
        $photos = $request->file('photo');
        $sizes = $request->input('size'); 
        $colors = $request->input('color');
        $sizedata = "";
        $colordata = "";
        $increment=0;

        // getting sizes
        foreach ($sizes as $size) {
            # code...
            $sizedata = $sizedata.$size."*";
        }

        // getting colors
        foreach ($colors as $color) {
            # code...
            $colordata = $colordata.$color."*";
        }

        if ($photos) {
            # code...
            $this->validate($request, [
                'photo' => 'array|required',
                'photo.*' => 'image|nullable|max:1999|required',
            ]);

            foreach ($photos as $photo) {
                // 1 : file name with extension
                $fileNameWithExt = $photo->getClientOriginalName();

                // 2 : file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                // 3 : file extension
                $ext = $photo->getClientOriginalExtension();
                
                // 4 : file name to store
                $fileNameToStore = $fileName.'_'.time().$increment.'.'.$ext;
                
                $imagesdata = $imagesdata.$fileNameToStore."*";
    
                // 5 : uploading file
                $path = $photo->storeAs('public/productimages', $fileNameToStore);
                $increment++;
            }
            $product->photo = $product->photo.$imagesdata;
        }

        $product->tcat_id = $request->input('tcat_id');
        $product->mcat_id = $request->input('mcat_id');
        $product->ecat_id = $request->input('ecat_id');
        $product->p_name = $request->input('p_name');
        $product->p_old_price = $request->input('p_old_price');
        $product->p_current_price = $request->input('p_current_price');
        $product->p_qty = $request->input('p_qty');
        $product->size = $sizedata;
        $product->color = $colordata;
        $product->p_description = $request->input('p_description');
        $product->p_short_description = $request->input('p_short_description');
        $product->p_feature = $request->input('p_feature');
        $product->p_condition = $request->input('p_condition');
        $product->p_return_policy = $request->input('p_return_policy');
        $product->p_is_featured = $request->input('p_is_featured');
        $product->p_is_active = $request->input('p_is_active');

        $product->update();

        return back()->with("status", "The product has been successfully updated !!!.");

    }

    public function deleteotherphoto($id, $photo){
        
        $product = Product::find($id);
        $imagesdata="";
        $updatedphotos = explode($photo."*", $product->photo);

        foreach($updatedphotos as $updatedphoto){
            if ($updatedphoto) {
                $imagesdata = $imagesdata.$updatedphoto;
            }
        }

        $product->photo = $imagesdata;
        Storage::delete("public/productimages/$photo");
        $product->update();

        return back();

    }

    public function deleteproduct($id){
        
        $product = Product::find($id);
        Storage::delete("public/productimages/$product->p_featured_photo");

        $photos = explode("*", $product->photo);

        foreach($photos as $photo){
            Storage::delete("public/productimages/$photo");
        }

        $product->delete();

        return back()->with("status", "The product has been successfully deleted !!!");
        
    }
    
}
