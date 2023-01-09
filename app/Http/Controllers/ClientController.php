<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function homepage(){
        return view("client.home");
    }

    public function about(){
        return view("client.about");
    }

    public function faq(){
        return view("client.faq");
    }

    public function contact(){
        return view("client.contact");
    }

    public function login(){
        return view("client.login");
    }

    public function register(){
        return view("client.registration");
    }

    public function cart(){
        return view("client.cart");
    }

    public function checkout(){
        return view("client.checkout");
    }

    public function dashboard(){
        return view("client.dashboard");
    }

    public function profile(){
        return view("client.profile");
    }

    public function billingdetails(){
        return view("client.billingdetails");
    }

    public function viewpassword(){
        return view("client.viewpasswordfields");
    }

    public function customersorders(){
        return view("client.customerorder");
    }

    public function viewproductbycategory(){
        return view("client.viewproductbycategory");
    }

    public function viewproductdatails(){
        return view("client.viewproductdetails");
    }
}
