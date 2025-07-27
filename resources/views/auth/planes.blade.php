@extends('layouts.app')

@section('contenido')
@vite(['resources/login_f/login.css'])

  <div>
      <div class="navLogin">
        <x-nav-guess color="blue"></x-nav-guess>
    </div>

    <x-contactos-login></x-contactos-login>

    <div class="container-fluid bg-white">

        <div class="py-5">
            <x-planes></x-planes>
        </div>

        <!-- Footer visual personalizado -->
            <div class="my-5 bg-white">
              <div class="row justify-content-center">
                <div class="col-md-8 position-relative">
                  <div class="footer-banner rounded" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxETFJY50uvgVOs3OPrYzN-RQ5JMQfFJOQyg&s');">
                    <div class="footer-content text-white p-3 d-flex flex-column justify-content-left">
                      <h4 class="mb-5 mt-5 font-weight-bold text-dark" style="font-size: 2rem">¿No estás seguro de qué plan elegir?</h4>
                      <div class="mt-auto">
                        <a href="#" class="btn bg-blue">Contáctanos</a>
                      </div>
                    </div>
                    {{-- <img src="woman.png" alt="Woman" class="footer-woman d-none d-md-block"> --}}
                  </div>
                </div>
              </div>
            </div>
    </div>
  </div>

@stop
