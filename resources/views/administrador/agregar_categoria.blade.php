@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">
<div class="row">
   
    <div class="col-md-12 order-md-1">

      <h4 class="mb-3">Nuevo cliente</h4>
      <form action="{{ route('agregar_categoria') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="categoria">Nombre categoria {{ session('email') }}</label>
            
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="" value="" required>
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    </div>    
  </div>
</div>
@endsection