<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pagina de inicio</title>
  <link rel="stylesheet" href="assets/landing/css/estilo.css">
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
      <a class="navbar-brand" href="#">Startworking</a>
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
          <li class="nav-item">
          <a class="nav-link" href="{{ route('inicioadmin') }}">Administrador</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('contenido')

  

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/landing/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
