<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;


class Espacio_trabajo extends Controller
{
    public function modificarespacio(Request $request, $id){

        $los_datos_a_modificar=DB::select('select * from espacio_trabajo where ID_espacio_trabajo='.$id);
        return view('administrador.modificarespacio',compact('los_datos_a_modificar'));

    }
    public function agregar_espacio(){
        return view('administrador.agregar_espacio');
    }

    public function listar_espacio(){

        $espacios= DB::select('SELECT espacio_trabajo.id_espacio_trabajo,espacio_trabajo.capacidad,espacio_trabajo.descripcion,espacio_trabajo.estado,espacio_trabajo.precio,espacio_trabajo.url_img,categoria.nombre_cat FROM espacio_trabajo INNER JOIN categoria ON  espacio_trabajo.id_espacio_trabajo = categoria.id_categoria;'); 
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

        $categoria =$actualziarespacio->categoria;

        $capacidad = $actualziarespacio->capacidad;
        
        $precio = $actualziarespacio->precio;

        $descripcion =$actualziarespacio->descripcion;

        $estado= $actualziarespacio->combobo;

        $dato = DB::select('call actualizar_espacio(?,?,?,?,?,?,?)', [$id_espacio,$capacidad,$categoria,$descripcion,$estado,$precio,$nombre]);

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
}
