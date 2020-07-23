<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{

    public function index(){
        return view('usuario.index');

    }


    public function detventa(){
        return view('usuario.detventa');

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


    public function modificarespacio(Request $los_datos_modificar_espacio){

        $id_espacio_m->los_datos_modificar_espacio->id_modificar;
        

        return view('administrador.modificarespacio',compact('id_espacio_m'));

    }

    public function listaclientes(){

        $hr = DB::select('SELECT * FROM usuario');        
        
        return view('administrador.listaclientes', compact('hr'));

    }

    public function listar_espacio(){

        $espacios= DB::select('SELECT * FROM espacio_trabajo'); 
        return view ('administrador.listar_espacio',compact('espacios'));
    }

    public function crear_espacio (Request $agregar_espacio){

        //$id_espacio = $agregar_espacio->ID;


        $file = $agregar_espacio->file('file');

        $nombre = $file->getClientOriginalName();
        
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $capacidad = $agregar_espacio->capacidad;
        
        $precio = $agregar_espacio->precio;

        $descripcion =$agregar_espacio->descripcion;

        $estado= 'Disponible';

        $dato = DB::select('call agregar_espacio(?,?,?,?,?)', [$capacidad,$descripcion,$estado,$precio,$nombre]);

        return back()->with('mensaje','Agregado con exito');

    }
    
    public function crearusuario(Request $recuperar){

        $rut = $recuperar->rut;

        $nombre = $recuperar->nombre;

        $pass = $recuperar->pass;

        $tipo = 'Fantasma';

        $estado = 'Soy admin';

        $telefono = $recuperar->telefono;

        $email = $recuperar->email;

        $dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,$pass,$tipo,$telefono,$email,$estado]);

        return back()->with('mensaje','Agregado con exito');                
    }

    public function hora2(){

        

    }
}
