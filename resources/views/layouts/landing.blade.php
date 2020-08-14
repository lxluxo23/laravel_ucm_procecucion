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
          <li class="nav-item">
            <a class="nav-link" href="#">Nuestro servicio</a>
          </li>

          @if (session('logueado')!=1)
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#ModalLogin">Login</a>
            </li>
          @endif
          @if (session('logueado')==1)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Cerrar sesión</a>
            </li>
          @endif
          @if (session('admin')==1)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('inicioadmin') }}">Administrador</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('contenido')

  
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/landing/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 
  <script src="{{ asset('assets/landing/vendor/bootstrap/bootstrap.js') }}"></script>

<!-- Modal -->                                    
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Desea arrendar {{$item->nombre_cat}}?</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <label style="margin-bottom: 2em">Porfavor complete los datos a continuación</label>
      
          <!-- Formulario Modal -->
          <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="h1 panel-title">Acceso</div>
                        </div>
                        <div class="panel-body">          
                        <form method="POST" action="{{route('logueame')}}">
                            {{csrf_field()}}
                                <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Ingresa Email">
                                    {!!$errors->first ('email','<span class="help-block">:message </span>')!!}
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                                </div>
                                <button class="btn btn-primary">Acceder</button>
                            </form>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
      </div>
    </div>
  </div>
</div>



</body>

</html>
