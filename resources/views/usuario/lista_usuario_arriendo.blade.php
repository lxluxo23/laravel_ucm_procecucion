<link rel="stylesheet" href="assets/landing/css/estilo.css">

@extends('layouts.landing')
@section('contenido')


<div class="container-fluid">
    <br><br>
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Arriendos</h1>
      
      @if(session('mensaje'))
  
        <div class="alert alert-success" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>!</strong>
          {{ session('mensaje') }}
        </div>
      @csrf
      @endif
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Listado de Arriendo</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
              <thead>
                <tr>
                  <th>Número del espacio arrendado</th>
                  <th>Día de reserva</th>
                  <th>Fecha inicio</th>
                  <th>Fecha final</th>
                  <th>Tipo de pago</th>
                  <th>Total</th>
                  <th>Estado</th>
         
                </tr>
              </thead>
              <tbody>
                @foreach($arr as $item)
                <tr>
                  <td>{{$item->id_espacio_trabajo}}</td>
                  <td>{{$item->fecha_reserva}}</td>
                  <td>{{$item->fecha_ini_solicitada}}</td>
                  <td>{{$item->fecha_fin_solicitada}}</td>
                  <td>{{$item->Nombre_pago}}</td>
                  <td>{{$item->valor_Total}}</td>
                  <td>{{$item->estado}}</td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  
  </div>

@endsection