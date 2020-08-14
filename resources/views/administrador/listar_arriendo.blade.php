@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Arriendos</h1>
    <p class="mb-4">Elimine seleccionando el boton a la derecha en la fila correspondiente al arriendo.</p>
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
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Fecha de reserva</th>
                <th>Fecha inicio</th>
                <th>Fecha final</th>
                <th>Titular</th>
                <th>Estado</th>
                <th>Tipo de pago</th>
                <th>Total</th>
                
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($arr as $item)
              <tr>
                <td>{{$item->id_reserva}}</td>
                <td>{{$item->fecha_reserva}}</td>
                <td>{{$item->fecha_ini_solicitada}}</td>
                <td>{{$item->fecha_fin_solicitada}}</td>
                <td>{{$item->titular}}</td>
                <td>{{$item->estado}}</td>
                <td>{{$item->tipo_pago}}</td>
                <td>{{$item->valor_total}}</td>
                <td><a href='{{('modificarespacio/')}}{{$item->id_reserva}}'><img id='img_tab_edit' src='images/edit.jpg' width="50"/></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>

@endsection