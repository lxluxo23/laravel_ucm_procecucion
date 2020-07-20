@extends('layouts.plantillaadmin')

@section('contenidoadmin')
<div class="container-fluid">
<div class="row">
   
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">Agregar Espacio de trabajo</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-6">
            <label for="rut">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="" value="" required>
            <div class="invalid-feedback">
              Ingrese Nombre por favor
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">E-mail <span class="text-muted"></span></label>
          <input type="email" class="form-control" id="email" placeholder="">
          <div class="invalid-feedback">
            Porfavor ingrese un E-mail valido.
          </div>
        </div>

        <div class="mb-3">
          <label for="telefono">Telefono</label>
          <input type="number" class="form-control" id="telefono" placeholder="" required>
        </div>
        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>
    
  </div>
</div>
@endsection