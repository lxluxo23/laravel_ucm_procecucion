<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $imagenes = \DB::table ('imagens')->select ('url')->first();
        //return view('usuario.index',compact ('imagenes'));
        return view('usuario.index')->with('imagenes',$imagenes);
        //return view('usuario.index');
    }

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

    
}
