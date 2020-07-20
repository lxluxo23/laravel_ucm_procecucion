@extends('layouts.plantillaadmin')

@section('contenidoadmin')
<div class="container-fluid">
<div class="row">
   
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">Agregar Espacio de trabajo</h4>
      <form class="needs-validation" novalidate>
        <div class="row">         
          <div class="col-md-6 mb-3">
            <label for="nombre">ID</label>
            <input type="text" class="form-control" id="ID" placeholder="" value="" required>
            <div class="invalid-feedback">
              Ingrese ID
            </div>
          </div>
          <div class="col-md-6 mb-6">
            <label for="Capacidad">Capacidad</label>
            <input type="number" class="form-control" id="capacidad" placeholder="" required>
            <div class="invalid-feedback">
              Ingrese Cantidad
            </div>
        </div>

          <div class="col-md-6 mb-4">
            <label for="descripcion">Descripcion<span class="text-muted"></span></label>
            <textarea class="form-control" id="descripcion" rows="5"></textarea>
          </div>
        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>
    
  </div>
</div>
@endsection