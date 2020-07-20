@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CLIENTES</h1>
    <p class="mb-4">podra selleccionar el cliente que desaea modificar o eliminar.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de clientes</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>LOS BOTONES</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>111111</td>
                <td>luis cespedes</td>
                <td>luxo@luxo.luxo</td>
                <td>23</td>
                <td>LOS BOTONES</td>
              </tr>
              <tr>
                <td>22222222</td>
                <td>felipe herrera</td>
                <td>lockus@lockus.lockus</td>
                <td>63</td>
                <td>LOS BOTONES</td>
              </tr>
              <tr>
                <td>0000000000</td>
                <td>yo</td>
                <td>yo@yo.yo</td>
                <td>66</td>
                <td>LOS BOTONES</td>
              </tr>
              <tr>
                <td>3333333333333333</td>
                <td>El adrian</td>
                <td>eidrian.eidrian.eidrian</td>
                <td>22</td>
                <td>LOS BOTONES</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection