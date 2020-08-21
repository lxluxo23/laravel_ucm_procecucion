@extends('layouts.plantillaadmin')
@section('contenidoadmin')
<link rel="stylesheet" href="../assets/landing/css/estilo.css">
<div class="contenedordeinicioAdmin">
  <div class="fondoblancotransp"></div>
  <div style="background: rgba(255, 255, 255, 0.863); width:60%; height:55em; position:absolute; left:20%; border: 1px solid rgba(119, 119, 119, 0.808)">

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
    <br><br>
    <h1 class="mb-5" style="text-align:center;">Modificar Usuario.</h1>
    <form method="POST" action="{{route('actualizar_usuario')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="row">  

          <div class="col-md-1 mb-3"></div>   
          <div class="col-md-5 mb-3">
            <label for="rut">RUT</label>
            <input type="number" readonly class="form-control" id="rut" name="rut" placeholder="" value="{{$item->rut}}" required>
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col-md-5 mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="{{$item->nombre}}" required>
          </div>
          <div class="col-md-1 mb-3"></div> 

          <div class="col-md-1 mb-3"></div> 
          <div class="col-md-5 mb-3">
            <label for="email">E-mail <span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}" placeholder=""> 
          </div>
          <div class="col-md-5 mb-3">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{$item->telefono}}" placeholder="" required>
          </div>
          <div class="col-md-1 mb-3"></div> 

          <div class="col-md-1 mb-3"></div> 
          <div class="col-md-5 mb-3">
            <label for="Estado">Estado</label>
              <select id="estadoc" name="estadoc" class="form-control"> 
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
          </div>
          <div class="col-md-6 mb-3"></div> 

          <div class="col-md-1 mb-3"></div> 
          <div class="col-md-10 mb-3">
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Actualizar</button>
          </div> 
          <div class="col-md-1 mb-3"></div> 
        </div>
        
    </form>
    @endforeach

  </div>
</div>
</div>
</div>
</div>
<script>
 
    document.getElementById("estadoc").value = `{{$item->estado}}`;

  
</script>

@endsection