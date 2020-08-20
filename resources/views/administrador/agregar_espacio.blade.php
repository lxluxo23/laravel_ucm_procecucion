@extends('layouts.plantillaadmin')
@section('contenidoadmin')
<link rel="stylesheet" href="assets/landing/css/estilo.css">
<div class="contenedordeinicioAdmin">
  <div class="fondoblancotransp"></div>
  <div style="background: rgba(255, 255, 255, 0.863); width:60%; height:55em; position:absolute; left:20%; border: 1px solid rgba(119, 119, 119, 0.808)"></div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 order-md-1">
      <br><br>
      @if(session('mensaje'))
      <div class="alert alert-success" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>!</strong>
        {{ session('mensaje') }}
      </div>   
      @endif

      <h1 class="mb-5" style="text-align:center;">Agregar Espacio de trabajo</h1>
     
      <form action ="{{ route('crear_espacio') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf

        <div class="row">    
          
          <div class="col-md-3 mb-4"></div>
          <div class="col-md-3 mb-4">
            <label for="Capacidad">Capacidad</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="" required>
            <div class="invalid-feedback">
              Ingrese cantidad
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="Categoria">Categoría</label>
            <button class="btn btn-light"  data-toggle="modal" data-target="#catmodal">Nueva</button>
              <select id="categoria" name="categoria" class="form-control"> 
                @foreach($categoria as $item)  

              <option value="{{$item->id_categoria}}">{{$item->nombre_cat}}</option>
                @endforeach
              </select>
              

          </div>
          <div class="col-md-3 mb-4"></div>

          
          <div class="col-md-3 mb-4"></div>
          <div class="col-md-3 mb-3">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="" value="" required>
            <div class="invalid-feedback">
              Ingrese precio
            </div>
          </div>
          <div class="col-md-3 mb-4"></div>
          <div class="col-md-3 mb-4"></div>

          <div class="col-md-3 mb-4"></div>
          <div class="col-md-6 mb-4">
            <label for="descripcion">Descripción<span class="text-muted"></span></label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="5"></textarea>
          </div>  
          <div class="col-md-3 mb-4"></div>

          <div class="col-md-3 mb-4"></div>
          <div class="col-md-6 mb-4" style="padding-left: 0">
            <label class="col-md-4 control-label">Nuevo Archivo</label>
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
          <div class="col-md-3 mb-4"></div>


          <div class="col-md-3 mb-4"></div>
          <div class="col-md-6 mb-4">
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
          </div>
          <div class="col-md-3 mb-4"></div>

        </div>
      </form>
    </div>
  </div>
</div>
</div>   

<div class="modal fade" id="catmodal" tabindex="-1" role="dialog" aria-labelledby="catmodalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style="border: none ; background: #f8f8fd">
      <div class="modal-header" style="z-index:100 ;background: #007bff">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="h1 panel-title" style="color:#007bff ;text-align: center; margin-top:40">Agregar categoria</div>
      <div class="modal-body" >
        <!-- Formulario Modal -->
        
        <div class="container" >     
        <br>        
          <form method="POST" action="{{route('nuevacategoria')}}">
            @csrf
            <div class="form-group">
              <label for="Ncategoria">Nombre de Categoria</label>
              <input type="text" class="form-control" id="Ncategoria" name="Ncategoria">
            </div>
            <button class="form-control btn btn-primary" style="margin-bottom:20">Agregar</button>
            </form>    
        </div>

      </div>
    </div>
  </div>
</div>

@endsection