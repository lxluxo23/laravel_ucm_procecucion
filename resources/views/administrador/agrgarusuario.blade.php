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
            <input type="password" class="form-control" id="pass" name="pass" placeholder="" required>
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="pass2">Confirmar contraseña</label>
            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="" required>
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>
    
  </div>
</div>
@endsection