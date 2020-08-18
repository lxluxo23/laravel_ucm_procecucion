
@extends('layouts.landing')
@section('contenido')
<title>Registro</title>  
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

<div style="background: rgba(88, 159, 253, 0.253); width:20%; height:100%; position: absolute;"></div>
<div style="background:  rgba(88, 159, 253, 0.253); width:20%; height:100%; position: absolute; right:0"></div>
<div class="container-fluid">
  <div class="row">  
    <div class="col-md-12 order-md-1">
      
      <br><br>  
      <h4 class="h1 mb-5" style="text-align:center; color:#007bff">Registrarse.</h4>
      <br><br> 
      <form action="{{ route('registrarse') }}" method="POST">
        @csrf
        <div class="row" >
  
          <div class="col-md-3" ></div>
          <div class="col-md-3" >
            
            <label style="color:rgb(70, 111, 235);" for="rut">Rut</label>
            <input type="text" class="form-control" id="rut" name="rut" placeholder="" value="" required>
            <div class="invalid-feedback">
              Requiere ingresar rut.
            </div>
            <br>
            <label style="color:rgb(70, 111, 235);" for="email">E-mail <span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="">
            <div class="invalid-feedback">
                Porfavor ingrese un E-mail válido.
            </div>
            <br>
            <label style="color:rgb(70, 111, 235);" for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="" required>

          </div>

          <div class="col-md-3">
            <label for="nombre" style="color:rgb(70, 111, 235);">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="" required>
            <div class="invalid-feedback">
              Ingrese un nombre.               
            </div>
            <br>
            <label style="color:rgb(70, 111, 235);" for="telefono">Teléfono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="" required>
            <br>
            <label style="color:rgb(70, 111, 235);" for="pass2">Confirmar contraseña</label>
            <input type="password" class="form-control" id="pass2" name="pass2"  placeholder="" required>
            <br><br><br>
          </div>
          <div class="col-md-3"></div>
          <div class="col-md-3"></div>
            <div class="col-md-6">
              <button button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
            </div>
          <div class="col-md-3"></div>
          
        </div>
      </form>
      
    </div>        
  </div>
</div>

@endsection