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

    public function indexadmin(){
        return view('administrador.indexadmin');
    }

    public function nuevousuario(){
        return view('administrador.agrgarusuario');
    }

    public function listaclientes(){
        return view('administrador.listaclientes');
    }

    
}
