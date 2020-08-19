<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function indexadmin(){
        return view('administrador.indexadmin');
    }

    public function listar_arriendo(){

        $arr= DB::select('CALL lista_arriendo_adm()'); 
        return view ('administrador.listar_arriendo',compact('arr'));

    }

    public function agregar_arriendo(){

        $categorias= DB::select('call consulta_espacio_concategoria()'); 
        return view ('administrador.agregar_arriendo',compact('categorias'));

    }

    public function detallearriendo(Request $request, $id){
        $detalle_esp=DB::select('call consulta_espacio_concategoria_por_id('.$id.')');
        return view('administrador.detalle_arriendo',compact('detalle_esp'));
    }

    public function agregar_categoria(){

        return view ('administrador.agregar_categoria');

    }

    public function eliminar_arriendo (Request $request,$id){

        $arriendo_eliminar=DB::delete('delete from arriendo where id_reserva='.$id);

        return back()->with('mensaje','Eliminado Correctamente');

    }
}
