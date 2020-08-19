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
            <input type="number" readonly class="form-control" id="id_espacio" name="id_espacio" placeholder="" value="{{$item->id_espacio_trabajo}}" required>
            <div class="invalid-feedback">
            </div>
          </div>

          <div class="col-md-3 mb-3">
            <label for="Categoria">Categoria</label>
              <select id="categoria" name="categoria" class="form-control">
                @foreach($categoria as $cat) 
                  <option value="{{$cat->id_categoria}}">{{$cat->nombre_cat}}</option>
                @endforeach
              </select>
              
          </div>


          <div class="col-md-3 mb-3">
            <label for="capacidad">Capacidad</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="" value="{{$item->capacidad}}" required>
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
            <select id="combobo" name="combobo" class="form-control"> 
            @foreach ($los_datos_a_modificar as $item)
              <option value="Disponible">Disponible</option>
              <option value="No disponible">No disponible</option>
            @endforeach
            </select>
          </div>

          <div class="col-md-12 mb-4">
            <label for="descripcion">Descripcion<span class="text-muted"></span></label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{$item->descripcion}}</textarea>
          </div>

          <div class="col-md-6 mb-4">
            <label class="col-md-4 control-label">Editar Foto</label>
            
            
                <div class="col-md-6">
                  
                  <input type="file" class="form-control" name="file" onchange="loadFile(event)" >
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
        </div>
    </form>
    @endforeach

  </div>
</div>
</div>

<script>
  document.getElementById("categoria").selectedIndex = {{$item->categoria}}-1;
  document.getElementById("combobo").value = "{{$item->estado}}";
</script>

@endsection