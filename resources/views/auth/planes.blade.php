@extends('layouts.app')

@section('contenido')

@vite(['resources/login_f/login.css', 'resources/landing/main.css', 'resources/landing/animations.css', 'resources/landing/components.css', 'resources/landing/main.js'])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="navLogin">
  <x-nav-guess color="blue"></x-nav-guess>
</div>

<div class=" bg-white">
    <div class="py-5">
        <div class="text-center mb-3 py-5 my-5">
            <div class="textAzul body-titulo">Planes</div>
            <span class="body-texto-t" style="color: #5e6674">Elige la opción que más se adecúe a tus necesidades</span>
        </div>
        <x-planes></x-planes>
    </div>
</div>
<!-- Footer -->
<footer class="footer">
<div class="footer-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="footer-logo">
                    <i class="fa-solid fa-thumbs-up"></i> </i>Social Media
                </div>
                <div class="mt-3">
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="footer-heading">Producto</h6>
                <ul class="list-unstyled">
                    <li><a href="#features" class="footer-link">Características</a></li>
                    <li><a href="{{ route('planes') }}" class="footer-link">Precios</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="footer-heading">Soporte</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Preguntas Frecuentes</a></li>
                    <li><a href="#" class="footer-link">Contacto</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="footer-heading">Legal</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ asset('files/AvisoPrivacidad Lexia.pdf') }}" class="footer-link" target="_blank">Privacidad</a></li>
                    <li><a href="{{ asset('files/Terminos y Condiciones Lexia.pdf') }}" class="footer-link" target="_blank">Términos y Condiciones</a></li>
                </ul>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="footer-bottom mb-0">&copy; 2025 Lexia. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="footer-bottom mb-0">Hecho con <i class="fas fa-heart text-danger"></i> para profesionales legales</p>
            </div>
        </div>
    </div>
</div>
</footer>

@stop
