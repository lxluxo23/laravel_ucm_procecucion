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
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <form method="POST" action="{{route('actualizar_arriendo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                  @csrf
                @foreach($arr as $item)
                <tr>
                  <td>{{$item->id_espacio_trabajo}}</td>
                  <td>{{$item->fecha_reserva}}</td>
                  <td>{{$item->fecha_ini_solicitada}}</td>
                  <td>{{$item->fecha_fin_solicitada}}</td>
                  <td>{{$item->Nombre_pago}}</td>
                  <td>{{$item->valor_Total}}</td>
                  <td>{{$item->estado}}</td>
                  <td><a class="button" data-toggle="modal" data-target="#modal_eliminar"><img id='img_tab_edit' src='images/edit.jpg' width="50"/></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  
  </div>
  <div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="modal_eliminarLabel" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content" style="border: none ; background: #f8f8fd">
        <div class="modal-header" style="z-index:100 ;background: #ff0000">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="h1 panel-title" style="color:#ff0000 ;text-align: center; margin-top:40">Cancelar arriendo ?</div>
        <div class="h5 panel-title" style="color:#ff0000 ;text-align: center; margin:40">Se reembolsará con un coste del 10% del valor total del arriendo.</div>
        <div class="modal-body" >
          <!-- Formulario Modal -->
          
          <div class="container" >     
          <br>        
              <div class="form-group">
                <div class="row">
                  <button type="submit" class="btn btn-danger col-md-6 mb-3">SI</button>
                  <button type="buttom" data-dismiss="modal" class="btn btn-primary col-md-6 mb-3">NO</button>
                </div>
              </form>    
          </div>
  
        </div>
      </div>
    </div>
  </div>
@endsection