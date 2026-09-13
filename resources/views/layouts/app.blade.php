<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="El Instituto Superior Tecnológico Alberto Enríquez">
    <meta name="author" content="Ing.Raul Mina">

    <title>@yield('title')</title>



    <meta content="El Instituto Superior Tecnológico Alberto Enríquez " name="description">
    <meta content="Tecnológico, Alberto, Enríquez,Instituto,ISTAE,istae" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/info/2.webp') }}" rel="icon">
  <link href="{{ asset('assets/img/info/2.webp') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>

    <body>
    <main>

        <header id="header" class="header sticky-top">

            <div class="topbar d-flex align-items-center">
              <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                <i><h1 id="titulo_prin"> ISTAE / Instituto Superior Tecnológico Alberto Enríquez</h1></i>
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">secretariageneralistae@gmail.com</a></i>
                  <i class="bi bi-phone d-flex align-items-center ms-4"><span>0996566160</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                  <a href="https://x.com/IstaeSl/status/1912256186201829618" target="_blank"class="twitter"><i class="bi bi-twitter-x"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100094976070859"  target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/istae_2024/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <!--  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>-->
                </div>
              </div>
            </div><!-- End Top Bar -->

            <div class="branding d-flex align-items-cente">

              <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="{{route('home')}}" class="logo d-flex align-items-center">
                  <!-- Uncomment the line below if you also wish to use an image logo -->
                  <!-- <img src="assets/img/logo.png" alt=""> -->
                  <h2  class="sitename"><img src="../../assets/img/info/2.webp" class="img-fluid logo_titulo" > ISTAE</h2>
                  <span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">
                  <ul>
                    <li><a href="{{route('home')}}" class="active"><i class="bi bi-house-fill"></i> Inicio</a></li>

                    <li class="dropdown"><a href="{{route('home')}}"><i class="bi bi-building"></i> <span>Instituto</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li><a href="{{route('history')}}"><i class="bi bi-clock-history"></i> Historia</a></li>
                        <li><a href="{{route('filosofia')}}"><i class="bi bi-book"></i> Políticas Institucionales</a></li>
                        <li><a href="{{route('codigoE')}}"><i class="bi bi-shield-check"></i> Código de Ética</a></li>
                        <li><a href="{{route('docente')}}"><i class="bi bi-person-video3"></i> Docentes</a></li>
                        <li><a href="{{route('normativas')}}"><i class="bi bi-file-text"></i> Reglamentos y Normativas</a></li>
                        <li><a href="{{ route('categoriasinfoistae', ['categoria' => 'Convenios']) }}"><i class="bi bi-file-earmark-text"></i> Convenios</a></li>
                        <li><a href="{{route('admision')}}"><i class="bi bi-link"></i> Proceso de Admisión</a></li>
                      </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="bi bi-gear"></i> <span>Gestión Institucional</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li><a href="{{ route('bienestar.institucional') }}"><i class="bi bi-heart"></i> Bienestar Institucional</a></li>
                        <li><a href="{{ route('vinculacion') }}"><i class="bi bi-link"></i> Vinculación</a></li>
                        
                        <li><a href="{{ route('practicas.preprofesionales') }}"><i class="bi bi-briefcase"></i> Prácticas Pre Profesionales</a></li>
                                  <li><a href="{{ route('solicitudes.estudiantes') }}"><i class="bi bi-file-earmark-plus"></i> Solicitudes de Prácticas</a></li>
                        <li><a href="{{ route('aseguramiento.calidad') }}"><i class="bi bi-check-circle"></i> Aseguramiento de Calidad</a></li>
                        <li><a href="{{ route('categoriasinfoistae', ['categoria' => 'Planificación Estratégica']) }}"><i class="bi bi-graph-up"></i> Planificación Estratégica</a></li>
                      </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="bi bi-search"></i> <span>Investigación</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li><a href="{{ route('categorias', ['tipo_trabajo' => 'Artículos Científicos']) }}"><i class="bi bi-journal-text"></i> Artículos Científicos</a></li>
                        <li><a href="{{ route('categorias', ['tipo_trabajo' => 'Proyectos']) }}"><i class="bi bi-folder"></i> Revistas científicas y editoriales aliadas</a></li>
                        
                      </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="bi bi-transparency"></i> <span>Transparencia</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li><a href="{{ route('categoriasinfoistae', ['categoria' => 'Rendición de Cuenta']) }}"><i class="bi bi-file-earmark-text"></i> Rendición de Cuenta</a></li>
                        <li><a href="{{ route('categoriasinfoistae', ['categoria' => 'Poa']) }}"><i class="bi bi-calendar-check"></i> Poa</a></li>
                      </ul>
                    </li>

                    <li><a href="{{route('contacto')}}"><i class="bi bi-envelope"></i> Contacto</a></li>
                   
                    @if(session('user'))
           
                    <li class="dropdown"><a href="#"><i class="bi bi-gear-fill"></i> <span>CPNL</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                      <ul>
                        <li><a href="{{route('facebook_noticias.index')}}"><i class="bi bi-facebook"></i> Facebook Publicar</a></li>
                        <li><a href="{{route('normativa.index')}}"><i class="bi bi-file-text"></i> NormativasCPN</a></li>
                        <li><a href="{{route('infoistae.index')}}"><i class="bi bi-info-circle"></i> Infoistae</a></li>
                        <li><a href="{{route('proyectos.index')}}"><i class="bi bi-folder-fill"></i> ProyectosR</a></li>
                        <li><a href="{{route('user.index')}}"><i class="bi bi-people"></i> Usuarios</a></li>
                        <li><a href="{{route('admin.chat.index')}}"><i class="bi bi-robot"></i> Asistente Virtual</a></li>
                        <li><a href="{{route('exit')}}"><i class="bi bi-box-arrow-right"></i> Exit</a></li>
                      </ul>
                    </li>
                             <li><a href="{{route('dashboard')}}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                    @else
                    <li><a href="{{route('login')}}"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                    @endif
                  </ul>
                  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

              </div>

            </div>

        </header>
<style>
    .scrollable-div {
  max-height: 700px; /* Establece la altura máxima deseada */
  overflow-y: auto; /* Habilita la barra de desplazamiento vertical */
}
.h-5{
  display: none;
}
</style>

            <div >
            @yield('content')
        </div>

<br><br><br>
<!--
<footer id="footer" class="footer">



    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">

          <div class="footer-contact pt-3">

            <p class="mt-3"><strong>DIRECCIÓN:</strong>AV. Carchi, Instalaciones de la Unidad educativa Fiscomisional San Lorenzo</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 footer-about">

          <div class="footer-contact pt-3">

            <p class="mt-3"><strong>TELEFONO:</strong> <span>0996566160</span></p>

          </div>
        </div>
        <div class="col-lg-4 col-md-6 footer-about">

          <div class="footer-contact pt-3">

            <p class="mt-3" ><strong>EMAIL:</strong> <span>secretariageneralistae@gmail.com</span></p>
          </div>
        </div>

      </div>
    </div>


  </footer>
-->
  <style>
    .footer {
    background-color: var(--heading-color);
    color: var(--contrast-color);
    padding: 3rem 0 0;
    font-family: var(--font-primary);
    border-top: 4px solid var(--accent-color);
}

.footer-content {
    padding-bottom: 2rem;
}

.footer h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: var(--contrast-color);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer h4 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1.2rem;
    color: var(--contrast-color);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-info p {
    font-size: 0.95rem;
    line-height: 1.8;
    margin-bottom: 0;
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
}

.footer-contact p {
    font-size: 0.95rem;
    line-height: 1.8;
    margin-bottom: 0;
}

.footer-contact p i {
    width: 20px;
    color: var(--accent-color);
}

.footer-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links ul li {
    transition: all 0.3s ease;
}

.footer-links ul li:hover {
    transform: translateX(5px);
}

.footer .footer-links ul li a {
    color: var(--contrast-color);
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-links ul li a:hover {
    color: var(--accent-color);
}

.footer-links ul li a::before {
    content: "\F280";
    font-family: "bootstrap-icons";
    font-size: 0.75rem;
    color: var(--accent-color);
}

.footer-bottom {
    background: rgba(0, 0, 0, 0.1);
    padding: 1.5rem 0 5.5rem;
    margin-top: 2rem;
}

.footer-bottom .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.copyright {
    font-size: 0.9rem;
}

.copyright strong {
    color: var(--accent-color);
}

.footer .social-links {
    display: flex;
    gap: 1rem;
}

.footer .social-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: var(--contrast-color);
    transition: all 0.3s ease;
}

.footer .social-links a:hover {
    background: var(--accent-color);
    color: var(--contrast-color);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.footer i {
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .footer {
        padding-top: 2rem;
    }

    .footer-content [class^="col-"] {
        margin-bottom: 2rem;
    }

    .footer-bottom .container {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .footer .social-links {
        justify-content: center;
    }
}
  </style>
<footer class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3><i class="bi bi-building"></i> ISTAE</h3>
                        <p>
                            <i class="bi bi-geo-alt"></i>
                            AV. Carchi, Instalaciones de la Unidad educativa<br>
                            Fiscomisional San Lorenzo<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <h4><i class="bi bi-person-lines-fill"></i> Contacto</h4>
                        <p>
                            <i class="bi bi-telephone"></i> <strong>Teléfono:</strong> 0996566160<br>
                            <i class="bi bi-envelope"></i> <strong>Email:</strong> secretariageneralistae@gmail.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-links">
                        <h4><i class="bi bi-link-45deg"></i> Enlaces Útiles</h4>
                        <ul>
                            <li><a href="{{route('terminosycondiciones')}}">Términos y Condiciones</a></li>
                            <li><a href="{{route('contacto')}}">Contacto</a></li>
                            <li><a href="{{route('home')}}">Inicio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="copyright">
                &copy; {{date('Y')}} <strong>ISTAE</strong>. Todos los derechos reservados
            </div>
            <div class="social-links">
                <a href="https://x.com/IstaeSl/status/1912256186201829618" target="_blank" class="twitter">
                    <i class="bi bi-twitter-x"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100094976070859" target="_blank" class="facebook">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.instagram.com/istae_2024/" target="_blank" class="instagram">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- Popper.js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
            <script>
            function confirmDelete(event) {
          event.preventDefault();

            if (confirm('¿Estás seguro de que deseas eliminar este elemento?')) {

            document.getElementById(this).submit();
            }
            }
            </script>

<script>
    function imprimirDiv() {
       var contenidoDiv = document.getElementById("reportid").innerHTML;
       var ventanaImpresion = window.open('', '', 'width=800,height=600');
        ventanaImpresion.document.write('<html><head><title>Imprimir Div</title></head><body>');
      ventanaImpresion.document.write(contenidoDiv);
       ventanaImpresion.document.write('</body></html>');
       ventanaImpresion.document.close();
       ventanaImpresion.print();
     }
  </script>
@if($chatWidgetSettings && $chatWidgetSettings->is_enabled)
<style>
  .istae-chat-bubble-wrap {
    position: fixed;
    right: 16px;
    bottom: 16px;
    z-index: 99998;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  #istae-chat-bubble {
    position: static;
    width: 106px;
    height: 106px;
    border-radius: 0;
    border: none;
    padding: 0;
    background: transparent;
    box-shadow: none;
    cursor: pointer;
    overflow: visible;
    transition: transform 0.2s ease;
    flex-shrink: 0;
  }
  #istae-chat-bubble:hover { transform: scale(1.06); }
  #istae-chat-bubble img { width: 100%; height: 100%; object-fit: contain; display: block; filter: drop-shadow(0 6px 14px rgba(0,0,0,0.35)); }

  .istae-chat-tooltip {
    background: #fff;
    color: #212529;
    padding: 8px 14px;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    font-size: 14px;
    max-width: 220px;
    text-align: right;
    opacity: 0;
    transform: translateX(8px);
    transition: opacity 0.2s ease, transform 0.2s ease;
    pointer-events: none;
  }
  .istae-chat-bubble-wrap:hover .istae-chat-tooltip { opacity: 1; transform: translateX(0); }

  #istae-chat-panel {
    position: fixed;
    right: 20px;
    bottom: 134px;
    width: 340px;
    max-width: calc(100vw - 40px);
    height: 480px;
    max-height: calc(100vh - 140px);
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.25);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 99999;
    font-family: var(--default-font, inherit);
  }
  #istae-chat-panel.open { display: flex; }

  #istae-chat-header {
    background: var(--accent-color, #0d6efd);
    color: #fff;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
  }
  #istae-chat-header .title { display: flex; align-items: center; gap: 8px; font-weight: 600; }
  #istae-chat-header img { width: 32px; height: 32px; object-fit: contain; }
  #istae-chat-close { background: none; border: none; color: #fff; font-size: 20px; cursor: pointer; line-height: 1; }

  #istae-chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 14px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    background: #f5f7fb;
  }
  .istae-msg { max-width: 85%; padding: 8px 12px; border-radius: 12px; font-size: 14px; line-height: 1.4; white-space: pre-wrap; }
  .istae-msg.user { align-self: flex-end; background: var(--accent-color, #0d6efd); color: #fff; border-bottom-right-radius: 2px; }
  .istae-msg.assistant { align-self: flex-start; background: #fff; color: #212529; border: 1px solid #e3e6ea; border-bottom-left-radius: 2px; }
  .istae-msg.typing { align-self: flex-start; background: #fff; border: 1px solid #e3e6ea; color: #6c757d; font-style: italic; }
  .istae-msg p { margin: 0 0 8px; }
  .istae-msg p:last-child { margin-bottom: 0; }
  .istae-msg ul, .istae-msg ol { margin: 0 0 8px; padding-left: 20px; }
  .istae-msg ul:last-child, .istae-msg ol:last-child { margin-bottom: 0; }
  .istae-msg li { margin-bottom: 4px; }
  .istae-msg li:last-child { margin-bottom: 0; }
  .istae-msg code { background: rgba(0,0,0,0.08); padding: 1px 5px; border-radius: 4px; font-size: 0.9em; }
  .istae-msg.user code { background: rgba(255,255,255,0.2); }

  #istae-chat-form { display: flex; gap: 8px; padding: 10px; border-top: 1px solid #e3e6ea; flex-shrink: 0; background: #fff; }
  #istae-chat-input { flex: 1; border: 1px solid #ced4da; border-radius: 20px; padding: 8px 14px; font-size: 14px; resize: none; max-height: 80px; box-sizing: border-box; overflow-y: hidden; }
  #istae-chat-input:focus { outline: none; border-color: var(--accent-color, #0d6efd); }
  #istae-chat-send { background: var(--accent-color, #0d6efd); color: #fff; border: none; border-radius: 50%; width: 38px; height: 38px; flex-shrink: 0; cursor: pointer; }
  #istae-chat-send:disabled { opacity: 0.6; cursor: not-allowed; }

  @media (max-width: 480px) {
    #istae-chat-panel { right: 10px; left: 10px; width: auto; bottom: 116px; }
    .istae-chat-bubble-wrap { right: 10px; bottom: 10px; }
    #istae-chat-bubble { width: 84px; height: 84px; }
    .istae-chat-tooltip { display: none; }
  }
</style>

<div class="istae-chat-bubble-wrap">
    @if($chatWidgetSettings->tooltip_text)
    <span class="istae-chat-tooltip">{{ $chatWidgetSettings->tooltip_text }}</span>
    @endif
    <button id="istae-chat-bubble" type="button" aria-label="Abrir chat de ayuda" title="{{ $chatWidgetSettings->tooltip_text }}">
        <img src="{{ $chatWidgetSettings->icon_path ? asset($chatWidgetSettings->icon_path) : asset('assets/img/chatbot-icon.png') }}" alt="{{ $chatWidgetSettings->bot_name }}">
    </button>
</div>

<div id="istae-chat-panel" role="dialog" aria-label="{{ $chatWidgetSettings->bot_name }}">
    <div id="istae-chat-header">
        <div class="title">
            <img src="{{ $chatWidgetSettings->icon_path ? asset($chatWidgetSettings->icon_path) : asset('assets/img/chatbot-icon.png') }}" alt="">
            <span>{{ $chatWidgetSettings->bot_name }}</span>
        </div>
        <button id="istae-chat-close" type="button" aria-label="Cerrar chat">&times;</button>
    </div>
    <div id="istae-chat-messages"></div>
    <form id="istae-chat-form">
        <textarea id="istae-chat-input" rows="1" maxlength="2000" placeholder="Escribe tu pregunta..." required></textarea>
        <button id="istae-chat-send" type="submit" aria-label="Enviar">
            <i class="bi bi-send-fill"></i>
        </button>
    </form>
</div>

<script>
(function () {
    const bubble = document.getElementById('istae-chat-bubble');
    const panel = document.getElementById('istae-chat-panel');
    const closeBtn = document.getElementById('istae-chat-close');
    const form = document.getElementById('istae-chat-form');
    const input = document.getElementById('istae-chat-input');
    const sendBtn = document.getElementById('istae-chat-send');
    const messages = document.getElementById('istae-chat-messages');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const botName = @json($chatWidgetSettings->bot_name);

    let historyRendered = false;
    const historyPromise = fetch('{{ route('chat.history') }}', { headers: { 'Accept': 'application/json' } })
        .then((res) => res.ok ? res.json() : { messages: [] })
        .then((data) => data.messages || [])
        .catch(() => []);

    function escapeHtml(text) {
        return text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

    function renderInline(text) {
        // Links are pulled out into placeholders first so the HTML they inject
        // (e.g. target="_blank") can't be re-mangled by the bold/italic passes below.
        const placeholders = [];
        text = text.replace(/\[([^\]]+)\]\((https?:\/\/[^\s")]+|\/[^\s")]+)\)/g, function (m, label, url) {
            placeholders.push('<a href="' + url + '" target="_blank" rel="noopener noreferrer">' + label + '</a>');
            return '\u0000' + (placeholders.length - 1) + '\u0000';
        });

        text = text
            .replace(/`([^`]+)`/g, '<code>$1</code>')
            .replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>')
            .replace(/(^|[^*])\*([^*\n]+)\*(?!\*)/g, '$1<em>$2</em>')
            .replace(/(^|[^_])_([^_\n]+)_(?!_)/g, '$1<em>$2</em>');

        return text.replace(/\u0000(\d+)\u0000/g, function (m, i) { return placeholders[+i]; });
    }

    // Turns the assistant's Markdown-ish reply (bold, italics, lists) into safe HTML.
    // Input is escaped first, so only the tags introduced below can ever appear.
    function renderMarkdown(rawText) {
        const lines = escapeHtml(rawText).split('\n');
        let html = '';
        let listType = null; // 'ul' | 'ol' | null
        let paragraphLines = [];

        function flushParagraph() {
            if (paragraphLines.length) {
                html += '<p>' + paragraphLines.map(renderInline).join('<br>') + '</p>';
                paragraphLines = [];
            }
        }

        function closeList() {
            if (listType) {
                html += '</' + listType + '>';
                listType = null;
            }
        }

        lines.forEach((line) => {
            const trimmed = line.trim();
            const orderedMatch = trimmed.match(/^\d+[.)]\s+(.*)/);
            const bulletMatch = trimmed.match(/^[-*]\s+(.*)/);

            if (orderedMatch) {
                flushParagraph();
                if (listType !== 'ol') { closeList(); html += '<ol>'; listType = 'ol'; }
                html += '<li>' + renderInline(orderedMatch[1]) + '</li>';
            } else if (bulletMatch) {
                flushParagraph();
                if (listType !== 'ul') { closeList(); html += '<ul>'; listType = 'ul'; }
                html += '<li>' + renderInline(bulletMatch[1]) + '</li>';
            } else if (trimmed === '') {
                closeList();
                flushParagraph();
            } else {
                closeList();
                paragraphLines.push(trimmed);
            }
        });

        closeList();
        flushParagraph();

        return html;
    }

    function appendMessage(text, role) {
        const div = document.createElement('div');
        div.className = 'istae-msg ' + role;
        if (role === 'assistant') {
            div.innerHTML = renderMarkdown(text);
        } else {
            div.textContent = text;
        }
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
        return div;
    }

    function togglePanel(open) {
        panel.classList.toggle('open', open);
        if (open) {
            if (!historyRendered) {
                historyRendered = true;
                historyPromise.then((msgs) => {
                    if (msgs.length > 0) {
                        msgs.forEach((m) => appendMessage(m.content, m.role));
                    } else {
                        appendMessage('¡Hola! Soy ' + botName + ', el asistente virtual del ISTAE. ¿En qué puedo ayudarte hoy?', 'assistant');
                    }
                });
            }
            input.focus();
        }
    }

    bubble.addEventListener('click', () => togglePanel(!panel.classList.contains('open')));
    closeBtn.addEventListener('click', () => togglePanel(false));

    const MAX_INPUT_HEIGHT = 80;
    input.addEventListener('input', () => {
        input.style.height = 'auto';
        const needed = input.scrollHeight;
        input.style.height = Math.min(needed, MAX_INPUT_HEIGHT) + 'px';
        input.style.overflowY = needed > MAX_INPUT_HEIGHT ? 'auto' : 'hidden';
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;

        appendMessage(text, 'user');
        input.value = '';
        input.style.height = 'auto';
        input.style.overflowY = 'hidden';
        sendBtn.disabled = true;

        const typingEl = appendMessage('Escribiendo...', 'typing');

        fetch('{{ route('chat.send') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ message: text }),
        })
            .then((res) => res.json().then((data) => ({ ok: res.ok, data })))
            .then(({ ok, data }) => {
                typingEl.remove();
                appendMessage(ok ? data.reply : (data.error || 'Ocurrió un error.'), 'assistant');
            })
            .catch(() => {
                typingEl.remove();
                appendMessage('No se pudo conectar con el asistente. Verifica tu conexión.', 'assistant');
            })
            .finally(() => {
                sendBtn.disabled = false;
            });
    });

    form.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            form.requestSubmit();
        }
    });
})();
</script>
@endif

    </body>
</html>
