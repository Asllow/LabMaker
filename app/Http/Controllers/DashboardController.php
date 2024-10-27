<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function meuperfil()
    {
        $page = 'perfil';
        return view('perfil', compact('page'));
    }
}
