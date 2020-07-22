<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
<<<<<<< HEAD

=======
    public function index(){
        return view('usuario.index');
         
    }
>>>>>>> 681f6b705a66741e5c52ed902dc70f7436a01a06

    public function pago(){
        return view('usuario.pago');

    }
    public function agregar_espacio(){
        return view('administrador.agregar_espacio');
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

    public function listar_espacio(){
        return view ('administrador.listar_espacio');
    }

    /*

    
}
