
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lexia - Tu Asistente Legal de IA Personal</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    @vite(['resources/landing/main.css', 'resources/landing/animations.css', 'resources/landing/components.css', 'resources/landing/main.js'])

</head>
<body>
    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/landing/lexia-logo-white.png') }}" alt="Lexia Logo" class="navbar-logo">
                Lexia
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">

                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('login') }}" class="btn-signin">Iniciar Sesión</a>
                    <a href="{{ route('registro') }}" class="btn-signin">Registrate</a>
                    <a href="{{ route('planes') }}" class="btn-signin">Planes</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <div class="hero-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Rápida, Inteligente y Legal</h1>
                    <p class="hero-subtitle">La app que transforma tu despacho, tu aliado digital en cada caso.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('registro') }}" class="btn btn-demo btn-lg">
                            <i class="fas fa-play me-2"></i> Empieza ya
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 hero-visual">
                    <div class="hero-visual-content">

                        <img src="{{ asset('images/landing/lexia-hero-image.png') }}" class="hero-header-image img-secondary" alt="Lexia Header 2">
                        <div class="hero-glow"></div>
                        <div class="hero-overlay"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Value Proposition  -->
    <section class="value-section fade-in">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="section-title text-muted">Los principales desafíos que enfrentamos</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon" style="background: linear-gradient(135deg, #FEF3C7, #F59E0B); color: #92400E;">
                           <i class="fa-solid fa-bell-slash"></i>
                        </div>
                        <h5 class="fw-bold">Seguimiento desorganizado y sin alertas</h5>
                        <p class="text-muted">Notificaciones en tiempo real para tu equipo de trabajo y clientes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon" style="background: linear-gradient(135deg, #DBEAFE, #3B82F6); color: #1E40AF;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5 class="fw-bold">Falta de control sobre multiples casos</h5>
                        <p class="text-muted">Obtén un Dashboard con toda la información necesaria para tus casos.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon" style="background: linear-gradient(135deg, #E0E7FF, #8B5CF6); color: #5B21B6;">
                           <i class="fa-solid fa-calendar-xmark"></i>
                        </div>
                        <h5 class="fw-bold">Pérdida de tiempo en documentos y analisis</h5>
                        <p class="text-muted">Apoyaté de nuestra IA para resumir o encontrar información.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="value-card">
                        <div class="value-icon" style="background: linear-gradient(135deg, #D1FAE5, #10B981); color: #065F46;">
                           <i class="fa-solid fa-ban"></i>
                        </div>
                        <h5 class="fw-bold">Problemas financieros y sin control</h5>
                        <p class="text-muted">Accede a un dashboard financiero para llevar el control de tus finanzas de cada caso.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section fade-in" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-size: 2.5rem;"> Todas las herramientas legales que necesitas, en un solo lugar</h2>
                <p class="text-muted fs-5"> Funcionalidades diseñadas para simplificar tu experiencia y ayudarte a navegar el sistema legal con confianza.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #e9e7e7, #ffffff); color: #132c47;">
                            <i class="fa-chisel fa-regular fa-calendar"></i>
                        </div>
                        <h5 class="fw-bold">Calendario Legal</h5>
                        <p class="text-muted">Lleva el control de tus audiencias y citas por medio de Lexia</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #e9e7e7, #ffffff); color: #132c47;">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h5 class="fw-bold">Análisis con IA</h5>
                        <p class="text-muted">Sube documentos legales y obtén análisis instantáneo, resúmenes e información clave.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #e9e7e7, #ffffff); color: #132c47;">
                            <i class="fas fa-search"></i>
                        </div>
                        <h5 class="fw-bold">Seguimiento de Casos</h5>
                        <p class="text-muted">Notifica y actualiza el status de los casos para tus clientes.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #e9e7e7, #ffffff); color: #132c47;">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h5 class="fw-bold">Panel Financiero</h5>
                        <p class="text-muted">Calcula gastos e ingresos de tus casos.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #e9e7e7, #ffffff); color: #132c47;">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <h5 class="fw-bold">Usuario y Permisos</h5>
                        <p class="text-muted">Agrega usuarios a tu equipo para trabajar en conjunto.</p>
                      </div>

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: linear-gradient(135deg, #e9e7e7, #ffffff); color: #132c47;">
                           <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h5 class="fw-bold">Dashboard para tus necesidades</h5>
                        <p class="text-muted">Interfaz intuitiva y amigable en App para Android y IOS y tambien para Web.</p>

                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section fade-in">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-size: 2.5rem;">Lo que dicen nuestros usuarios</h2>
                <p class="text-muted fs-5">Únete a la red de usuarios satisfechos que confían en Lexia</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="testimonial-card">

                        <p class="testimonial-quote">"Lexia practicamente es un despacho de abogados en mi bolsillo, ya no tengo que usar Excel o la computadora tradicional para llevar el control de mi despacho."</p>
                        <h6 class="fw-bold mb-1">Javier Trujillo</h6>
                        <small class="text-muted">Empresario</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">

                        <p class="testimonial-quote">"Puedes notificar a tu cliente el estado de su caso y ellos pueden ver los documentos importantes, eso me ha ayudado a optimizar mi tiempo con mis clientes y a ellos les ayuda mucho."</p>
                        <h6 class="fw-bold mb-1">Omar Meda</h6>
                        <small class="text-muted">Abogado Privado</small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">

                        <p class="testimonial-quote">"Con lexia puedo analizar documentos con IA sin comprometer mi informacion, ChatGPT es bueno pero la informacion es publica."</p>
                        <h6 class="fw-bold mb-1">Aristeo Pimentel</h6>
                        <small class="text-muted">Abogado Publico</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section fade-in position-relative">
        <!-- Imagen izquierda -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 cta-content text-center">
              <h2 class="cta-title">Comienza a usar Lexia hoy</h2>
              <p class="fs-5 mb-4" style="color:  rgba(26, 26, 46, 0.95);">
                Uneté junto con tu despacho y agiliza tus casos
              </p>
              <a href="{{ route('registro') }}" class="btn btn-cta btn-lg px-5 py-3 mb-4">
                Registrarme
                <i class="fas fa-arrow-right ms-2"></i>
              </a>

              <!-- Nueva sección con logos -->
              <p class="mt-3" style="color:  rgba(26, 26, 46, 0.95); font-weight: 500;">
                Disponible en:
              </p>
              <div class="d-flex justify-content-center gap-3">
                <a href="#"><img src="{{ asset('images/landing/app-store-logo.webp') }}" alt="App Store" style="height:50px;"></a>
                <a href="#"><img src="{{ asset('images/landing/googleplay-store-logo.png') }}" alt="Play Store" style="height:50px;"></a>
              </div>
            </div>
          </div>
        </div>
      </section>



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

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>
