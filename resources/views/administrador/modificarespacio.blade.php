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
   
    @foreach($los_datos_a_modificar as $item)
    <form method="POST" action="{{route('actualizarespacio')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="row">         
        <div class="col-md-3 mb-3">
          <label for="id_espacio">ID</label>
        <input type="number" class="form-control" id="id_espacio" name="id_espacio" placeholder="" value="{{$item->ID_espacio_trabajo}}" required>
          <div class="invalid-feedback">
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="capacidad">Capacidad</label>
        <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="" value="{{$item->Capacidad}}" required>
          <div class="invalid-feedback">
            Ingrese Capacidad
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="precio">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" placeholder="" value="{{$item->precio}}" required>
          <div class="invalid-feedback">
            Ingrese Precio
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="Estado">Estado</label>
          <select class="form-control">
            <option value="1">Disponible</option>
            <option value="2">No disponible</option>
          </select>
        </div>
        <div class="col-md-12 mb-4">
          <label for="descripcion">Descripcion<span class="text-muted"></span></label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{$item->Descripcion}}</textarea>
        </div>

        <div class="col-md-6 mb-4">
          <label class="col-md-4 control-label">Editar Foto</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" onchange="loadFile(event)" >
                <div>
                </div>  
                <img name="portada" id="portada" width="250"/>
                <script>
                    var loadFile = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                      var output = document.getElementById('portada');
                      output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    };
                </script>
              </div>



        </div>

             
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
      </form>
    @endforeach

  </div>
</div>
@endsection