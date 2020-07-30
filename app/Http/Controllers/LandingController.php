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

        $pass2=$recuperar->pass2;

        $tipo = 'Usuario';
        
        $estado = 'ACTIVO';
    
        $telefono = $recuperar->telefono;
    
        $email = $recuperar->email;

        if (strcmp($pass, $pass2) === 0){

            $dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,$pass,$tipo,$estado,$telefono,$email]);
    
            return back()->with('mensaje','Agregado con exito');
        }
        else{

            return back()->with('error','Las contraseñas no coinciden');

        }             
    }

    public function modificar_usuario(Request $request, $id){

        $datos_usuario=DB::select('select * from usuario where rut='.$id);
        return view('administrador.modificar_usuario',compact('datos_usuario'));

    }


    public function actualizar_usuario(Request $actualizar_usuario){

    $rut=$actualizar_usuario->rut;

    $nombre=$actualizar_usuario->nombre;

    $email=$actualizar_usuario->email;

    $telefono=$actualizar_usuario->telefono;

    $estado=$actualizar_usuario->estado;

    $tipo='usuario'; //no webeen

    
    $dato = DB::select('call actualizar_usuario(?,?,?,?,?,?)', [$rut,$nombre,$tipo,$estado,$telefono,$email]);

    return back()->with('mensaje','Actualizado con exito! con exito');
        
    }

    public function eliminar_usuario (Request $request,$id){

        $eliminar_usuario=DB::delete('call eliminar_usuario('.$id.')');

        return back()->with('mensaje','Eliminado Correctamente');

    }

}
