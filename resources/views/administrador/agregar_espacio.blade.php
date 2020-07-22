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
      <h4 class="mb-3">Agregar Espacio de trabajo</h4>
      <form action ="{{ route('crear_espacio') }}" method="POST">
        @csrf
        <div class="row">         
          <div class="col-md-6 mb-3">
            <label for="nombre">ID</label>
            <input type="text" class="form-control" id="ID" name="ID" placeholder="" value="" required>
            <div class="invalid-feedback">
              Ingrese ID
            </div>
          </div>
          <div class="col-md-6 mb-6">
            <label for="Capacidad">Capacidad</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="" required>
            <div class="invalid-feedback">
              Ingrese Cantidad
            </div>
        </div>
        <div class="col-md-6 mb-3">
        <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="" value="" required>
            <div class="invalid-feedback">
              Ingrese precio
            </div>
          </div>

          <div class="col-md-6 mb-4">
            <label for="descripcion">Descripcion<span class="text-muted"></span></label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5"></textarea>
          </div>
        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>
    
  </div>
</div>
@endsection