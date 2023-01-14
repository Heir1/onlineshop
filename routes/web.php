<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// client controller

Route::get('/', [ClientController::class, 'homepage']);
Route::get('about', [ClientController::class, 'about']);
Route::get('faq', [ClientController::class, 'faq']);
Route::get('contact', [ClientController::class, 'contact']);
Route::get('login', [ClientController::class, 'login']);
Route::get('register', [ClientController::class, 'register']);
Route::get('cart', [ClientController::class, 'cart']);
Route::get('checkout', [ClientController::class, 'checkout']);
Route::get('dashboard', [ClientController::class, 'dashboard']);
Route::get('profile', [ClientController::class, 'profile']);
Route::get('billingdetails', [ClientController::class, 'billingdetails']);
Route::get('viewpassword', [ClientController::class, 'viewpassword']);
Route::get('customersorders', [ClientController::class, 'customersorders']);
Route::get('viewproductbycategory', [ClientController::class, 'viewproductbycategory']);
Route::get('viewproductdatails', [ClientController::class, 'viewproductdatails']);
Route::get('searchproduct', [ClientController::class, 'searchproduct']);


// admin controller

Route::get('admin', [AdminController::class, 'admindashboard']);
Route::get('admin/settings', [AdminController::class, 'settings']);
Route::get('admin/size', [AdminController::class, 'size']);
Route::get('admin/addsize', [AdminController::class, 'addsize']);
Route::get('admin/color', [AdminController::class, 'color']);
Route::get('admin/addcolor', [AdminController::class, 'addcolor']);
Route::get('admin/editcolor', [AdminController::class, 'editcolor']);
Route::get('admin/country', [AdminController::class, 'country']);
Route::get('admin/addcountry', [AdminController::class, 'addcountry']);
Route::get('admin/editcountry', [AdminController::class, 'editcountry']);
Route::get('admin/shippingcost', [AdminController::class, 'shippingcost']);
Route::get('admin/editshippingcost', [AdminController::class, 'editshippingcost']);
Route::get('admin/toplevelcategory', [AdminController::class, 'toplevelcategory']);
Route::get('admin/addtoplevelcategory', [AdminController::class, 'addtoplevelcategory']);
Route::get('admin/edittoplevelcategory', [AdminController::class, 'edittoplevelcategory']);
Route::get('admin/midlevelcategory', [AdminController::class, 'midlevelcategory']);
Route::get('admin/addmidlevelcategory', [AdminController::class, 'addmidlevelcategory']);
Route::get('admin/editmidlevelcategory', [AdminController::class, 'editmidlevelcategory']);
Route::get('admin/editmidlevelcategory', [AdminController::class, 'editmidlevelcategory']);
Route::get('admin/endlevelcategory', [AdminController::class, 'endlevelcategory']);
Route::get('admin/addendlevelcategory', [AdminController::class, 'addendlevelcategory']);
Route::get('admin/editendlevelcategory', [AdminController::class, 'editendlevelcategory']);
Route::get('admin/products', [AdminController::class, 'products']);
Route::get('admin/addproduct', [AdminController::class, 'addproduct']);
Route::get('admin/editproduct', [AdminController::class, 'editproduct']);
Route::get('admin/orders', [AdminController::class, 'orders']);
Route::get('admin/sliders', [AdminController::class, 'sliders']);
Route::get('admin/addslider', [AdminController::class, 'addslider']);
Route::get('admin/editslider', [AdminController::class, 'editslider']);
Route::get('admin/services', [AdminController::class, 'services']);
Route::get('admin/addservice', [AdminController::class, 'addservice']);
Route::get('admin/editservice', [AdminController::class, 'editservice']);
Route::get('admin/faq', [AdminController::class, 'faq']);
Route::get('admin/addfaq', [AdminController::class, 'addfaq']);
Route::get('admin/editfaq', [AdminController::class, 'editfaq']);
Route::get('admin/registeredcustomer', [AdminController::class, 'registeredcustomer']);
Route::get('admin/pagesettings', [AdminController::class, 'pagesettings']);
Route::get('admin/socialmedia', [AdminController::class, 'socialmedia']);
Route::get('admin/subscriber', [AdminController::class, 'subscriber']);
Route::get('admin/editprofile', [AdminController::class, 'editprofile']);

// Setting Controller
Route::post('admin/savelogo', [SettingController::class, 'savelogo']);
Route::put('admin/updatelogo/{id}', [SettingController::class, 'updatelogo']);
Route::post('admin/savefavicon', [SettingController::class, 'savefavicon']);
Route::put('admin/updatefavicon/{id}', [SettingController::class, 'updatefavicon']);
Route::post('admin/savecoordonate', [SettingController::class, 'savecoordonate']);
Route::put('admin/updatecoordonate/{id}', [SettingController::class, 'updatecoordonate']);
Route::post('admin/savemessage', [SettingController::class, 'savemessage']);
Route::put('admin/updatemessage/{id}', [SettingController::class, 'updatemessage']);
Route::post('admin/savecountproduct', [SettingController::class, 'savecountproduct']);
Route::put('admin/updatecountproduct/{id}', [SettingController::class, 'updatecountproduct']);
Route::post('admin/savehomesetting', [SettingController::class, 'savehomesetting']);
Route::put('admin/updatehomesetting/{id}', [SettingController::class, 'updatehomesetting']);
Route::post('admin/savemetadonnee', [SettingController::class, 'savemetadonnee']);
Route::put('admin/updatemetadonnee/{id}', [SettingController::class, 'updatemetadonnee']);
Route::post('admin/savefeaturedproduct', [SettingController::class, 'savefeaturedproduct']);
Route::put('admin/updatefeaturedproduct/{id}', [SettingController::class, 'updatefeaturedproduct']);
Route::post('admin/savelatestproduct', [SettingController::class, 'savelatestproduct']);
Route::put('admin/updatelatestproduct/{id}', [SettingController::class, 'updatelatestproduct']);
Route::post('admin/savepopularproduct', [SettingController::class, 'savepopularproduct']);
Route::put('admin/updatepopularproduct/{id}', [SettingController::class, 'updatepopularproduct']);
Route::post('admin/savenewsletter', [SettingController::class, 'savenewsletter']);
Route::put('admin/updatenewsletter/{id}', [SettingController::class, 'updatenewsletter']);
Route::post('admin/saveloginbanner', [SettingController::class, 'saveloginbanner']);
Route::put('admin/updateloginbanner/{id}', [SettingController::class, 'updateloginbanner']);
Route::post('admin/saveregistbanner', [SettingController::class, 'saveregistbanner']);
Route::put('admin/updateregistbanner/{id}', [SettingController::class, 'updateregistbanner']);
Route::post('admin/savepasswordbanner', [SettingController::class, 'savepasswordbanner']);
Route::put('admin/updatepasswordbanner/{id}', [SettingController::class, 'updatepasswordbanner']);
Route::post('admin/savepaymentsetting', [SettingController::class, 'savepaymentsetting']);
Route::put('admin/updatepaymentsetting/{id}', [SettingController::class, 'updatepaymentsetting']);

// ShopController
Route::post('admin/savesize', [ShopController::class, 'savesize']);
Route::get('admin/editsize/{id}', [ShopController::class, 'editsize']);
Route::put('admin/updatesize/{id}', [ShopController::class, 'updatesize']);
Route::delete('admin/deletesize/{id}', [ShopController::class, 'deletesize']);