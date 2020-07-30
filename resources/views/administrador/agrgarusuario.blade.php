@extends('layouts.plantillaadmin')

@section('contenidoadmin')



<div class="container-fluid">
<div class="row">
   
    <div class="col-md-12 order-md-1">

      @if(session('mensaje'))

      <div class="alert alert-success" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>!</strong>
          {{ session('mensaje') }}
      </div>
    @endif

      @if (session('error'))

      <div class="alert alert-warning" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>!</strong>
          {{ session('error') }}
      </div>
          
      @endif

      <h4 class="mb-3">Nuevo cliente</h4>
      <form action="{{ route('crear_usuario') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="rut">Rut</label>
            <input type="text" class="form-control" id="rut" name="rut" placeholder="" value="" required>
            <div class="invalid-feedback">
              Requiere ingresar rut.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="" required>
            <div class="invalid-feedback">
              ingrese un nombre.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">E-mail <span class="text-muted"></span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="">
          <div class="invalid-feedback">
            Porfavor ingrese un E-mail valido.
          </div>
        </div>

        <div class="mb-3">
          <label for="telefono">Telefono</label>
          <input type="number" class="form-control" id="telefono" name="telefono" placeholder="" required>
        </div>
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="" required>
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="pass2">Confirmar contraseña</label>
            <input type="password" class="form-control" id="pass2" name="pass2"  placeholder="" required>
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>
    
  </div>
</div>

<script>

  $(document).ready(function() {
    //variables
    var pass1 = $('[name=pass]');
    var pass2 = $('[name=pass2]');
    var confirmacion = "Las contraseñas si coinciden";
    var longitud = "La contraseña debe estar formada entre 4-20 carácteres (ambos inclusive)";
    var negacion = "No coinciden las contraseñas";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(pass2);
    span.hide();
    //función que comprueba las dos contraseñas
    function coincidePassword(){
    var valor1 = pass1.val();
    var valor2 = pass2.val();
    //muestro el span
    span.show().removeClass();
    //condiciones dentro de la función
    if(valor1 != valor2){
    span.text(negacion).addClass('negacion');	
    }
    if(valor1.length==0 || valor1==""){
    span.text(vacio).addClass('negacion');	
    }
    if(valor1.length<4 || valor1.length>20){
    span.text(longitud).addClass('negacion');
    }
    if(valor1.length!=0 && valor1==valor2){
    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
    }
    }
    //ejecuto la función al soltar la tecla
    pass2.keyup(function(){
    coincidePassword();
    });
  });
  </script>

@endsection