<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{


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
|--------------------------------------------------------------------------
| PARA LAS FUNCIONES POST
|--------------------------------------------------------------------------
*/
    public function crearusuario(Request $recuperar){



        $nombre = $recuperar->nombre;
/*
        if($valido == 1){
            $dato = DB::select('call InsertAtendedor(?,?,?)', [$run,$nombre,$estado]);
            return back()->with('mensaje','Ingresado con exito');
        }else{
            return back()->with('mensaje1','Rut incorrecto');
        }
*/
        
              
    }
    
}
