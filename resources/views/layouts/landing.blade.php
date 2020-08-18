<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pagina de inicio</title>
 
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/landing/css/heroic-features.css') }}" rel="stylesheet">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

  <link href="{{ asset('assets/administrador/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/administrador/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      
      <a class="navbar-brand" href="{{ route('inicio') }}"><b>Startworking</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          <a class="nav-link" href=" {{ route('inicio') }}">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pago') }}">Pagar</a>
          </li>
          @if (session('logueado')!=1)
            <li class="nav-item">
              <a class="nav-link" style="cursor:pointer;" data-toggle="modal" data-target="#ModalLogin">Iniciar sesión</a>
            </li>
          @endif
          @if (session('admin')==1)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('inicioadmin') }}">Administrador</a>
            </li>
          @endif
          @if (session('logueado')==1)
            <!--<li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a>
            </li>
            -->
            <!-- drop box -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-white small">{{session('email')}}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{route('logout')}}" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mis pedidos
                </a>
                
                <a class="dropdown-item" href="{{route('logout')}}" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesion
                </a>
              </div>
            </li>

          @endif

          
        </ul>
      </div>
    </div>
  </nav>

 

  
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/landing/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 
  <script src="{{ asset('assets/landing/vendor/bootstrap/bootstrap.js') }}"></script>

<!-- Modal -->                                    
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style="border: none ; background: #f8f8fd">
      <div class="modal-header" style="z-index:100 ;background: #007bff">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="h1 panel-title" style="color:#007bff ;text-align: center; margin-top:40">Iniciar sesión</div>
      <div class="modal-body" >
        <!-- Formulario Modal -->
        
        <div class="container" >     
        <br>        
          <form method="POST" action="{{route('logueame')}}">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
              <label for="email" style="color:rgb(91, 129, 241); font-weight: bold">Correo electronico</label>
              <input class="form-control" type="email" name="email">
              {!!$errors->first ('email','<span class="help-block">:message </span>')!!}
              </div>
              <div class="form-group">
                <label for="password" style="color:rgb(91, 129, 241); font-weight: bold">Contraseña</label>
                <input class="form-control" type="password" name="password">
              </div>
              <br><br>
              <button class="form-control btn btn-primary" style="margin-bottom:20">Acceder</button>
              <a href="{{route('registrame')}}">Crear nueva cuenta.</a>
            </form>    
        </div>

      </div>
    </div>
  </div>
</div>


@yield('contenido')
</body>

</html>
