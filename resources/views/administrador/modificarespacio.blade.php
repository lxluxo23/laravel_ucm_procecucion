@extends('layouts.plantillaadmin')
@section('contenidoadmin')
<link rel="stylesheet" href="../assets/landing/css/estilo.css">
<div class="contenedordeinicioAdmin">
  <div class="fondoblancotransp"></div>
  <div style="background: rgba(255, 255, 255, 0.863); width:60%; height:55em; position:relative; left:20%; border: 1px solid rgba(119, 119, 119, 0.808)">

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
    <br><br>
    <h1 class="mb-5" style="text-align:center;">Modificar espacio de trabajo.</h1>
    <form method="POST" action="{{route('actualizarespacio')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="row">       
          <div class="col-md-1 mb-3"></div>  
          <div class="col-md-5 mb-3">
            <label for="id_espacio">ID</label>
            <input type="number" readonly class="form-control" id="id_espacio" name="id_espacio" placeholder="" value="{{$item->id_espacio_trabajo}}" required>
            <div class="invalid-feedback">
            </div>
          </div>
          <div class="col-md-5 mb-3">
            <label for="Categoria">Categoria</label>
              <select id="categoria" name="categoria" class="form-control">
                @foreach($categoria as $cat) 
                  <option value="{{$cat->id_categoria}}">{{$cat->nombre_cat}}</option>
                @endforeach
              </select> 
          </div>
          <div class="col-md-1 mb-3"></div> 

          <div class="col-md-1 mb-3"></div>  
          <div class="col-md-5 mb-3">
            <label for="capacidad">Capacidad</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="" value="{{$item->capacidad}}" required>
            <div class="invalid-feedback">
              Ingrese Capacidad
            </div>
          </div>
          <div class="col-md-5 mb-3">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="" value="{{$item->precio}}" required>
         
            <div class="invalid-feedback">
              Ingrese Precio
            </div>
          </div>
          <div class="col-md-1 mb-3"></div>  

          <div class="col-md-1 mb-3"></div>  
          <div class="col-md-5 mb-3">
            <label for="Estado">Estado</label>
            <select id="combobo" name="combobo" class="form-control"> 
            @foreach ($los_datos_a_modificar as $item)
              <option value="Disponible">Disponible</option>
              <option value="No disponible">No disponible</option>
            @endforeach
            </select>
          </div>
          <div class="col-md-6 mb-3"></div>  

          <div class="col-md-1 mb-3"></div>  
          <div class="col-md-10 mb-4">
            <label for="descripcion">Descripcion<span class="text-muted"></span></label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{$item->descripcion}}</textarea>
          </div>
          <div class="col-md-1 mb-3"></div>  

          <div class="col-md-1 mb-3"></div>  
          <div class="col-md-5 mb-4">
            <label class="col-md-4 control-label">Editar Foto</label>           
            <div class="col-md-12">                 
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
          <div class="col-md-5 mb-3">
            <br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
          </div>  
          
        </div>
    </form>
    @endforeach

  </div>
</div>
</div>
</div>
</div>

<script>
  document.getElementById("categoria").selectedIndex = {{$item->categoria}}-1;
  document.getElementById("combobo").value = "{{$item->estado}}";
</script>

@endsection