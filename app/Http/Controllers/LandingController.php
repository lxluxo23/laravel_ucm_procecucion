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

    public function detaespacio(Request $request, $id){
        $dato_espacio=DB::select('select * from espacio_trabajo where ID_espacio_trabajo='.$id);
        return view('usuario.detaespacio',compact('dato_espacio'));
    }

    public function listaclientes(){

        $hr = DB::select('SELECT * FROM usuario');        
        
        return view('administrador.listaclientes', compact('hr'));

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
