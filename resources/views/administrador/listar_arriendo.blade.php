@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">
  <br><br>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Arriendos</h1>
    <p class="mb-4">Modifique seleccionando el boton a la derecha en la fila correspondiente al arriendo.</p>
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
                <th>Numero del espacio</th>
                <th>Día de reserva</th>
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
                <td>{{$item->id_espacio_trabajo}}</td>
                <td>{{$item->fecha_reserva}}</td>
                <td>{{$item->fecha_ini_solicitada}}</td>
                <td>{{$item->fecha_fin_solicitada}}</td>
                <td>{{$item->titular}}</td>
                <td>{{$item->estado}}</td>
                <td>{{$item->Nombre_pago}}</td>
                <td>{{$item->valor_Total}}</td>
               
                @if((date('Y-m-d')) <= ($item->fecha_ini_solicitada))
                  @if(($item->estado) <> 'Cancelado')
                    <td><a href='{{('modificar_arriendo/')}}{{$item->id_reserva}}'><img id='img_tab_delete' src='images/cance.jpg' width="30"/></a></td>
                  @else
                    <td><img id='img_tab_delete' src='images/cance.jpg' disabled style="filter: grayscale(100%);" width="30"/></td>
                  @endif
                @else
                  <td><img id='img_tab_delete' src='images/cance.jpg' disabled style="filter: grayscale(100%);" width="30"/></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>

@endsection