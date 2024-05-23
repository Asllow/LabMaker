<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return auth()->user()->permission_era . auth()->user()->permission_maker . auth()->user()->permission_makesoft;
    }

    public function dashboard(){
        return view('dashboard');
    }

}
