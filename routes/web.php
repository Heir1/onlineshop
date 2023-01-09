<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

