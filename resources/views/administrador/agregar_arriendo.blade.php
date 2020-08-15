<link rel="stylesheet" href="assets/landing/css/estilo.css">

@extends('layouts.plantillaadmin')
@section('contenidoadmin')

<div class="contenedordeinicioAdmin">
  <div class="fondoblancotransp">
  </div>
      <!-- Page Content -->
  <div class="container">

    <div class="row text-center" >

      @foreach ($categorias as $item)

      <div class="col-lg-3 col-md-6 mb-4" style="margin-top:100;">
        <div class="contendorimagenesinicioadmin h-100">
          <img class="card-img-top" src="images/{{$item->url_img}}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{$item->nombre_cat}}</h4>
            <p class="card-text">{{$item->descripcion}}</p>
            <p class="card-text">$ {{$item->precio}} x día</p>
          </div>
          <div class="botonadminarr">
            <a href="{{('detaespacio/')}}{{$item->id_espacio_trabajo}}" class="btn btn-primary">Ver más detalles</a>
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