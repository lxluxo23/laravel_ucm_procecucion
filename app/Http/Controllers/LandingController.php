<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Collection;
class LandingController extends Controller
{

    public function pago(){
        return view('usuario.pago');

    }

    public function login (){
        return view ('usuario.login');
    }

    public function registrame(){

        return view ('usuario.registrame');
    }
    public function logueame(Request $login){
        

        $usuario=$login->email;
        $contraseña=$login->password;

        $pass=md5($contraseña);

        //echo $pass;
        //$eliminar_usuario=DB::delete('call eliminar_usuario('.$id.')');

        $sql= DB::select('call loguear(?,?)',[$usuario,$pass]);

        foreach($sql as $algo){
            $validar=$algo->resultado;
           
        }
        if ($validar==1){
            
            session(['logueado' => 1]);
            session(['email' => $usuario]);
            return redirect('/');

            //return session('email');
        }
        elseif ($validar==2){

            session(['admin' =>1]);
            session(['logueado' => 1]);
            session(['email' => $usuario]);

            return view('administrador.indexadmin');
            //return session('email');
            
        }
        
        
        else{
            return back()
            ->withErrors(['email' => 'Error al iniciar sesión  verifique mail y contraseña'])
            ->withInput(['email'=>$usuario]);
        }
    }
    

    public function logout(){
        session()->flush();
        return redirect('/');
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

            $dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,md5($pass1),$tipo,$estado,$telefono,$email]);
    
            return back()->with('mensaje','Agregado con exito' );

            }
        }
        else{
            return back()->with('error','Las contraseñas no coinciden' .$pass .$pass2);
        }             
    }

    public function registrarse(Request $recuperar){

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

            $dato = DB::select('call agregar_usuario(?,?,?,?,?,?,?)', [$rut,$nombre,md5($pass1),$tipo,$estado,$telefono,$email]);
    
            
                
            return redirect()->route('inicio')->with('success', 'Usuario registrado con éxito.');

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

    return back()->with('mensaje','Actualizado con exito!');
        
    }

    public function eliminar_usuario (Request $request,$id){

        $eliminar_usuario=DB::delete('call eliminar_usuario('.$id.')');

        return back()->with('mensaje','Eliminado Correctamente');

    }

    public function modificar_arriendo (Request $request,$id){

        $eliminar_usuario=DB::delete('call cancelar_arriendo('.$id.')');

        return back()->with('mensaje','La reserva a sido canselada con exito');

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


    public function agregararriendo(Request $agregar_arriendo){

        if (session('logueado')==1){
            $diainicio=$agregar_arriendo->diainicio;
        
            $diafinal=$agregar_arriendo->diafinal;

            $ruttitular=$agregar_arriendo->ruttitular;
    
            $sql= DB::select("select rut from usuario where email='".session('email')."'");
            
            if($ruttitular){
                $titular=$ruttitular;
            }else{
                foreach($sql as $algo){
                    $titular=$algo->rut;
                }   
            }

            $TotalPago=$agregar_arriendo->TotalPago;
        
            $idespaciotrabajo=$agregar_arriendo->idespaciotrabajo;
        
            $datos = DB::select("call agregar_arriendo(?,?,?,?,?)", [$diainicio,$diafinal,$titular,$TotalPago,$idespaciotrabajo]);
            
            return back()->with('mensaje','Reserva realizada con éxito! lo estaremos esperando!');
    
        }
        else{
            return back()->with('error','Tienes que iniciar sesión!');
        }
    }


    public function listaArriendos(){
        if (session('logueado')==1){
        $sql= DB::select("select rut from usuario where email='".session('email')."'");
  
        foreach($sql as $algo){
                $titular=$algo->rut;
        }   
             
        $arr= DB::select('CALL lista_arriendo_usu('.$titular.')');
        return view ('usuario.lista_usuario_arriendo', compact('arr'));
        }

        else{
            return back()->with('error','Tienes que iniciar sesión!');
        }


        
    }

    public function actualizar_arriendo(Request $actualizar_arriendo){

        $id = $actualizar_arriendo->id_reserva;

        $dato = DB::select('call actualizar_usuario(?)', [$id]);
        return back()->with('mensaje','Arriendo cancelado!');

    }
}
