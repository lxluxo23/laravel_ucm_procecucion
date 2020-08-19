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
      @csrf
    @endif

    @foreach($datos_usuario as $item)
    <form method="POST" action="{{route('actualizar_usuario')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="row">         
          <div class="col-md-6 mb-3">
            <label for="rut">RUT</label>
            <input type="number" readonly class="form-control" id="rut" name="rut" placeholder="" value="{{$item->rut}}" required>
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{$item->nombre}}" required>
          </div>

          <div class="col-md-4 mb-3">
            <label for="email">E-mail <span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}" placeholder="">
            
        </div>

        <div class="col-md-4 mb-3">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{$item->telefono}}" placeholder="" required>
          </div>

          <div class="col-md-4 mb-3">
            <label for="Estado">Estado</label>
              <select id="estado" name="estado" class="form-control"> 
                <option value="Activo">ACTIVO</option>
                <option value="Inactivo">Inactivo</option>
              </select>
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Actualizar</button>
        </div>
    </form>
    @endforeach

  </div>
</div>
</div>

<script>
  document.getElementById("estado").value = "{{$item->estado}}";
</script>

@endsection