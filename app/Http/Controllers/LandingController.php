<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        return view('usuario.index');
    }

    public function pago(){
        return view('usuario.pago');

    }
}
