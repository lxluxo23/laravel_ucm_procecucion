@extends('layouts.plantillaadmin')
@section('contenidoadmin')
<link rel="stylesheet" href="assets/landing/css/estilo.css">
<div class="contenedordeinicioAdmin">
  <div class="fondoblancotransp"></div>
  <div style="background: rgb(240, 240, 240); width:60%; height:55em; position:absolute; left:20%; border: 1px solid rgb(119, 119, 119)"></div>

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
              <select id="categoria" name="categoria" class="form-control"> 
                <option value="1">Espacio pequeño</option>
                <option value="2">Espacio mediano</option>
                <option value="3">Espacio grande</option>
                <option value="4">Titanico</option>
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

@endsection