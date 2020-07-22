@extends('layouts.landing')

@section('contenido')
<div class="contenedordeinicio">
      <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="contenedorheader my-4">
      <h1 class="display-3">Bienvenido a nuestra casa!</h1>
      <p class="lead">Busca un lugar comodo y perfecto para el cual puedas ejercer tus proyectos</p>
      <a href="#" class="btn btn-primary btn-lg">Ir a nuestro catálogo</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="contendorimagenesinicio h-100">
          <img class="card-img-top" src="images/espacio1.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Espacio pequeño</h4>
            <p class="card-text">De 1cm x 2cm el cual incluye una mesa para 100 personas con un cocina y baño</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Ver más detalles</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="contendorimagenesinicio h-100">
        <img class="card-img-top" src="images/espacio2.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Espacio medio</h4>
            <p class="card-text">De 2cm x 3cm el cual incluye una mesa para 200 personas, cocina, pista de baile, cancha de tenis y un baño</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Ver más detalles</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="contendorimagenesinicio h-100">
          <img class="card-img-top" src="images/espacio3.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Espacio grande</h4>
            <p class="card-text">De 3cm x 4cm el cual incluye una mesa para 300 personas, cocina, pista de baile, cancha de tenis, una base militar y un baño</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Ver más detalles</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="contendorimagenesinicio h-100">
          <img class="card-img-top" src="images/espacio4.jpg" alt="">
          <div class="card-body">
            <h4 class="card-title">Espacio titánico</h4>
            <p class="card-text">De 4cm x 4cm el cual incluye una mesa para 400 personas, cocina, pista de baile, cancha de tenis, una base militar, un planeta y un baño</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Ver más detalles</a>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection