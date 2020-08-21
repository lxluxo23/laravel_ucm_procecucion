@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">
    <br><br>

    <h4 class="h1 mb-5" >Nueva Categoria :</h4>
    <!-- Page Heading -->

    <form action="{{route('nuevacategoria')}}" method="POST" >
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <label for="Ncategoria">Nombre de categoria</label>
                <div class="input-group">
                    
                    <input type="text" class="form-control" name="Ncategoria" id="Ncategoria">
                    <span>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                  </span>
                </div>
              </div>
            
        </div>
    </form>
    <h1 class="h3 mb-2 text-gray-800">Categorias</h1>
    <p class="mb-4">Modifique o elimine seleccionando los botones a la derecha en la fila correspondiente a la categoria</p>

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
        
        <h6 class="m-0 font-weight-bold text-primary">Listado de Categorias</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categorias as $item)
              <tr>
                <td>{{$item->id_categoria}}</td>
                <td>{{$item->nombre_cat}}</td> 
                <td><a href='{{('modificar_categoria/')}}{{$item->id_categoria}}'><img id='img_tab_edit' src='images/edit.jpg' width="50"/></a> 
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection