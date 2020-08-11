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

    public function login (){
        return view ('usuario.login');
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

        $rut = preg_replace('/[^k0-9]/i', '', $recuperar->rut);

        if($this->valida_rut($rut) == true){
            $valido = 1;
        }else{
            $valido = 0;
        }

        $nombre = $recuperar->nombre;

        $pass1 = $recuperar->pass1;

        $pass2=$recuperar->pass2;

        $tipo = 'Usuario';
        
        $estado = 'ACTIVO';
    
        $telefono = $recuperar->telefono;
    
        $email = $recuperar->email;

        if (strcmp($pass1, $pass2) === 0){

            if ($valido == 0){
                return back()->with('error','Por favor ingrese un rut valido');
            }

            if ($valido == 1){

            $dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,$pass1,$tipo,$estado,$telefono,$email]);
    
            return back()->with('mensaje','Agregado con exito ' );

            }
        }
        else{
            return back()->with('error','Las contraseñas no coinciden' .$pass .$pass2);
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

    $tipo='usuario'; 

    
    $dato = DB::select('call actualizar_usuario(?,?,?,?,?,?)', [$rut,$nombre,$tipo,$estado,$telefono,$email]);

    return back()->with('mensaje','Actualizado con exito! con exito');
        
    }

    public function eliminar_usuario (Request $request,$id){

        $eliminar_usuario=DB::delete('call eliminar_usuario('.$id.')');

        return back()->with('mensaje','Eliminado Correctamente');

    }

    public function valida_rut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;
    
            $suma += $v * $i;
            ++$i;
        }
    
        $dvr = 11 - ($suma % 11);
        
        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';
    
        if($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }


    public function validar_horario($id,$fini,$ffin){
        $hr = DB::select('call calcular_horario_disp(5,2020-08-17,2020-08-19,@temp)');
        return $hr;

    }

    public function prueb(){
     
        return "asd";

    }

}
