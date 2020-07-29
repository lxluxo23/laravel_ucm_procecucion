<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{

    public function index(){
        $espacioss= DB::select('SELECT * FROM espacio_trabajo'); 
        return view ('usuario.index',compact('espacioss'));
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



    public function modificarespacio(Request $request, $id){

        $los_datos_a_modificar=DB::select('select * from espacio_trabajo where ID_espacio_trabajo='.$id);
        return view('administrador.modificarespacio',compact('los_datos_a_modificar'));

    }

    public function detaespacio(Request $request, $id){
        $dato_espacio=DB::select('select * from espacio_trabajo where ID_espacio_trabajo='.$id);
        return view('usuario.detaespacio',compact('dato_espacio'));
    }

    public function listaclientes(){

        $hr = DB::select('SELECT * FROM usuario');        
        
        return view('administrador.listaclientes', compact('hr'));

    }

    public function listar_espacio(){

        $espacios= DB::select('SELECT * FROM espacio_trabajo'); 
        return view ('administrador.listar_espacio',compact('espacios'));
    }


    public function actualizarespacio(Request $actualziarespacio){



        $file = $actualziarespacio->file('file');

        if ($file){
            
            $nombre = $file->getClientOriginalName();
        
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }
        else{

            echo "no hay archivo";

            $nombre='';
        }
        
        
        
        $id_espacio = $actualziarespacio->id_espacio;

        $capacidad = $actualziarespacio->capacidad;
        
        $precio = $actualziarespacio->precio;

        $descripcion =$actualziarespacio->descripcion;

        $estado= $actualziarespacio->combobo;

        $dato = DB::select('call actualizar_espacio(?,?,?,?,?,?)', [$id_espacio,$capacidad,$descripcion,$estado,$precio,$nombre]);

        return back()->with('mensaje','Actualizado con exito! con exito');

    }


    public function eliminar_espacio (Request $request,$id){

        $los_datos_a_eliminar=DB::delete('delete from espacio_trabajo where ID_espacio_trabajo='.$id);

        return back()->with('mensaje','Eliminado Correctamente');

    }

    public function crear_espacio (Request $agregar_espacio){

        //$id_espacio = $agregar_espacio->ID;


        $file = $agregar_espacio->file('file');

        $nombre = $file->getClientOriginalName();
        
        \Storage::disk('local')->put($nombre,  \File::get($file));

        $capacidad = $agregar_espacio->capacidad;

        $categoria=$agregar_espacio->categoria;
        
        $precio = $agregar_espacio->precio;

        $descripcion =$agregar_espacio->descripcion;

        $estado= 'Disponible';

        $dato = DB::select('call agregar_espacio(?,?,?,?,?,?)', [$capacidad,$categoria,$descripcion,$estado,$precio,$nombre]);

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
