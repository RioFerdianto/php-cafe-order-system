<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function home()
    {
        $menus = Menu::all(); // Ambil semua kopi
        return view('home', compact('menus'));
    }

}
