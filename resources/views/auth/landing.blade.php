@extends('layouts.app')

@section('contenido')
@vite(['resources/login_f/login.css'])
    <div>
        <div class="navLogin">
        <x-nav-guess color="blue"></x-nav-guess>
    </div>

    <div class="container-fluid bg-white">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LexiApp Parallax</title>
  <style>
    /* Contenedor parallax */
    .parallax {
      background-image: url('ruta-a-tu-imagen.png');
      min-height: 100vh;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    /* Texto sobre la imagen (opcional) */
    .overlay-text {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-shadow: 0 2px 8px rgba(0,0,0,0.7);
    }
  </style>
</head>
<body>

  <!-- Sección parallax -->
  <section class="parallax">
    <div class="overlay-text">
      <h1 class="display-4 font-weight-bold">LEXIAPP</h1>
    </div>
  </section>

  <!-- Contenido debajo -->
  <section class="py-5 bg-blue">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-3 mb-4">
          <h3 class="p-0 m-0">Hecho por abogados, <h4>para abogados. Una solución legal diseñada desde la experiencia real del ejercicio profesionista.</h4></h3>
        </div>
        <div class="col-md-3 mb-4">
          <h3 class="p-0 m-0">Compatible con cualquier tamaño de despacho, <h4>desde estudios pequeños hasta grandes firmas</h4></h3>
        </div>
        <div class="col-md-3 mb-4">
          <h5>Minimalista y fácil de usar</h5>
          <p>Con una interfaz intuitiva que no requiere curva de aprendizaje.</p>
        </div>
        <div class="col-md-3 mb-4">
          <h5>IA integrada</h5>
          <p>Para tareas jurídicas concretas, más que automatización básica.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- Sección de características con íconos -->
<section class="py-5">
  <div class="container">
    <div class="row text-center">
      <!-- Recomendación: incluir FontAwesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
            crossorigin="anonymous">

      <div class="col-6 col-md-2 mb-4">
        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
          <i class="fas fa-balance-scale fa-2x text-primary"></i>
        </div>
        <p class="mt-2">Gestión de casos por fase</p>
      </div>

      <div class="col-6 col-md-2 mb-4">
        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
          <i class="fas fa-file-invoice-dollar fa-2x text-primary"></i>
        </div>
        <p class="mt-2">Control de gastos y tareas</p>
      </div>

      <div class="col-6 col-md-2 mb-4">
        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
          <i class="fas fa-robot fa-2x text-primary"></i>
        </div>
        <p class="mt-2">Inteligencia artificial para redacción</p>
      </div>

      <div class="col-6 col-md-2 mb-4">
        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
          <i class="fas fa-calendar-check fa-2x text-primary"></i>
        </div>
        <p class="mt-2">Calendario jurídico inteligente</p>
      </div>

      <div class="col-6 col-md-2 mb-4">
        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
          <i class="fas fa-user-cog fa-2x text-primary"></i>
        </div>
        <p class="mt-2">Administración de usuarios y permisos</p>
      </div>

      <div class="col-6 col-md-2 mb-4">
        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
          <i class="fas fa-mobile-alt fa-2x text-primary"></i>
        </div>
        <p class="mt-2">Versión web y app móvil</p>
      </div>
    </div>
  </div>
</section>

<!-- Sección de llamada a la acción -->
<section class="py-5 text-white bg-blue">
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
    <div>
      <h2 class="font-weight-bold">
        ¿Estás listo para transformar tu forma de trabajar?
      </h2>
      <p>Elige el plan que mejor se adapta a tu despacho y comienza hoy a optimizar tu gestión legal con tecnología diseñada por y para abogados.</p>
    </div>
    <a href="#" class="btn btn-outline-light btn-lg mt-3 mt-md-0">Comenzar ahora</a>
  </div>
</section>



</div>
@stop
<script src="{{ asset('dist/jquery/dist/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('js/RecuperarContrasena/recuperarContrasena.js') }}"></script> --}}

<script>
window.addEventListener('scroll', () => {
  const sc = window.scrollY;
  document.querySelector('.parallax').style.backgroundPositionY = `${sc * 0.5}px`;
});
</script>
