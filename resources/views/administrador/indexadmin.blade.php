@extends('layouts.plantillaadmin')

@section('contenidoadmin')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Tablero</h1>             
            </div>
  
            <!-- Content Row -->
            <div class="row">
  
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ingreso mensual</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$RECIBIR DATO DE BD</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">INGRESO ANUAL</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$RECIBIR DATO DE BD</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Capasidad</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">RECIBIR DATO DE BD %</div>
                          </div>
                          <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendientes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">RECIBIR DATO DE BD</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Content Row -->
  

  
            <!-- Content Row -->
            <div class="row">
  
              <!-- Content Column -->
              <div class="col-lg-12 mb-4">
  
  
                <!-- Color System -->
                <div class="row">
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                      <div class="card-body">
                        Seccion 1
                        <div class="text-white-50 small">#4e73df</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                      <div class="card-body">
                        Seccion 2
                        <div class="text-white-50 small">#1cc88a</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                      <div class="card-body">
                        Seccion 3
                        <div class="text-white-50 small">#36b9cc</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                      <div class="card-body">
                        Seccion 4
                        <div class="text-white-50 small">#f6c23e</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                      <div class="card-body">
                        Seccion 5
                        <div class="text-white-50 small">#e74a3b</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                      <div class="card-body">
                        Seccion 6
                        <div class="text-white-50 small">#858796</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-4">
                    <div class="card bg-light text-black shadow">
                      <div class="card-body">
                        Seccion 7
                        <div class="text-black-50 small">#f8f9fc</div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                      Seccion 8
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                  </div>
                </div>
              </div>
  
              </div>
            </div>
  
          </div>

@endsection