@extends('layouts.landing')

@section('contenido')
<div class="contenedordeinicio">
  <div class="fondoblancotransp">
  </div>
      <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="contenedorheader my-4">
      <div class="imagenheader">
        <h1 class="display-3"><b class="TextoTituloInicio">Bienvenidos a nuestra casa!</b></h1>
        <p class="lead"><b class="TextoTituloInicio" >Busque un lugar comodo y perfecto para el cual puedas ejercer tus proyectos</b></p>
        <a href="#" class="btn btn-primary btn-lg">Ir a nuestro catálogo</a>
      </div>
    </header>

    <!-- Page Features -->
    
   
        
    <div class="row text-center">

      @foreach ($esp as $item)

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="contendorimagenesinicio h-100">
          <img class="card-img-top" src="images/espacio1.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Espacio pequeño</h4>
            <p class="card-text">{{$item->Descripcion}}</p>
          </div>
          <div class="card-footer">
            <a href="{{ route('detaespacio') }}" class="btn btn-primary">Ver más detalles</a>
          </div>
        </div>
      </div>

      @endforeach
    </div>
    
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection