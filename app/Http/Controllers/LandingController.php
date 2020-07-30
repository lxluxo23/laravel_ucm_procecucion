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
    
    public function indexadmin(){
        return view('administrador.indexadmin');
    }

    public function nuevousuario(){
        return view('administrador.agrgarusuario');
    }

    public function listaclientes(){

        $hr = DB::select('SELECT * FROM usuario');        
        
        return view('administrador.listaclientes', compact('hr'));

    }
    
    public function crearusuario(Request $recuperar){

        $rut = $recuperar->rut;

        $nombre = $recuperar->nombre;

        $pass = $recuperar->pass;

        $tipo = 'Usuario';

        $estado = 'ACTIVO';

        $telefono = $recuperar->telefono;

        $email = $recuperar->email;

        $dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,$pass,$tipo,$estado,$telefono,$email]);

        return back()->with('mensaje','Agregado con exito');                
    }

    public function modificar_usuario(Request $request, $id){

        $datos_usuario=DB::select('select * from usuario where rut='.$id);
        return view('administrador.modificar_usuario',compact('datos_usuario'));

    }

    public function hora2(){

        

    }

}
