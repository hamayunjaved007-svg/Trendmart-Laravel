<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    // Welcome Page
    public function home()
    {
        return view('welcome');
    }

    // About Page
    public function about()
    {
        return view('about');
    }

    // Contact Page
    public function contact()
    {
        return view('contact');
    }

    // Products Page
    public function products()
    {
        return view('products');
    }

    // Cart Page
    public function cart()
    {
        return view('cart');
    }

    // Checkout Page
    public function checkout()
    {
        return view('checkout');
    }

    // Show Product Page
    public function showproduct()
    {
        return view('showproduct');
    }

    // Refund Page
    public function refund()
    {
        return view('refund');
    }

    // Privacy Page
    public function privacy()
    {
        return view('privacy');
    }

    // FAQ Page
    public function faq()
    {
        return view('faq');
    }




}
