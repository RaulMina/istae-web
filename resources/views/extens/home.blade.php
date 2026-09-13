<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<main class="main">
    <!-- Hero Carousel Section -->
    <section class="hero-carousel">
        <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Diapositiva 1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Diapositiva 2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Diapositiva 3"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Diapositiva 4"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4" aria-label="Diapositiva 5"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item carousel-item--contain active"
                     style="background-image: url('{{ asset('assets/img/carrusel/desarrollo-software-2026.webp') }}');">
                    <a href="{{ route('softw_carre') }}"
                       class="carousel-image-link"
                       aria-label="Conocer la carrera de Desarrollo de Software">
                        <img src="{{ asset('assets/img/carrusel/desarrollo-software-2026.webp') }}"
                             class="carousel-visual d-block w-100"
                             alt="Estudiantes del ISTAE en una jornada académica dentro del laboratorio informático"
                             fetchpriority="high">
                    </a>
                    <div class="carousel-caption">
                        <h2 data-aos="fade-up" style="color: #fff;">Desarrollo de Software</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Convierte ideas en soluciones tecnológicas que transforman el futuro</p>
                        <a href="{{ route('softw_carre') }}" class="btn btn-primary" data-aos="fade-up" data-aos-delay="400">Ver carrera</a>
                    </div>
                </div>

                <div class="carousel-item carousel-item--contain"
                     style="background-image: url('{{ asset('assets/img/carrusel/formacion-automotriz-2026.webp') }}');">
                    <a href="{{ route('automotriz_carre') }}"
                       class="carousel-image-link"
                       aria-label="Conocer la carrera de Mecánica Automotriz">
                        <img src="{{ asset('assets/img/carrusel/formacion-automotriz-2026.webp') }}"
                             class="carousel-visual d-block w-100"
                             alt="Estudiantes del ISTAE realizando prácticas de mecánica automotriz"
                             loading="lazy">
                    </a>
                    <div class="carousel-caption">
                        <h2 data-aos="fade-up" style="color: #fff;">Mecánica Automotriz</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Domina el diagnóstico, mantenimiento y reparación de vehículos</p>
                        <a href="{{ route('automotriz_carre') }}" class="btn btn-primary" data-aos="fade-up" data-aos-delay="400">Ver carrera</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <a href="{{ route('agricola_carre') }}"
                       class="carousel-image-link"
                       aria-label="Conocer la carrera de Mecanización Agrícola">
                        <img src="{{ asset('assets/img/carrusel/aprendizaje-territorio-2026.webp') }}"
                             class="carousel-visual d-block w-100"
                             alt="Estudiantes del ISTAE participando en una jornada de aprendizaje en territorio"
                             loading="lazy">
                    </a>
                    <div class="carousel-caption">
                        <h2 data-aos="fade-up" style="color: #fff;">Mecanización Agrícola</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Integra tecnología, producción sostenible y conocimiento del territorio</p>
                        <a href="{{ route('agricola_carre') }}" class="btn btn-primary" data-aos="fade-up" data-aos-delay="400">Ver carrera</a>
                    </div>
                </div>

                <div class="carousel-item carousel-item--magazines">
                    <a href="{{ route('categorias', ['tipo_trabajo' => 'Proyectos']) }}"
                       class="carousel-image-link"
                       aria-label="Conocer las revistas científicas y editoriales aliadas del ISTAE">
                        <div class="magazine-slide-media" aria-hidden="true">
                            <div class="magazine-logo-card">
                                <img src="{{ asset('assets/img/aliados/reincisol.png') }}" alt="">
                            </div>
                            <div class="magazine-logo-card">
                                <img src="{{ asset('assets/img/aliados/social.png') }}" alt="">
                            </div>
                            <div class="magazine-logo-card">
                                <img src="{{ asset('assets/img/aliados/luminis.png') }}" alt="">
                            </div>
                        </div>
                    </a>
                    <div class="carousel-caption">
                        <h2 data-aos="fade-up" style="color: #fff;">Revistas científicas y editoriales aliadas</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Conocimiento, investigación y cooperación que trascienden fronteras</p>
                        <a href="{{ route('categorias', ['tipo_trabajo' => 'Proyectos']) }}"
                           class="btn btn-primary"
                           data-aos="fade-up"
                           data-aos-delay="400">Ver revistas</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <a href="{{ route('history') }}"
                       class="carousel-image-link"
                       aria-label="Conocer la historia institucional del ISTAE">
                        <img src="{{ asset('assets/img/carrusel/historia-istae-2026.webp') }}"
                             class="carousel-visual d-block w-100"
                             alt="Collage institucional del ISTAE con actividades académicas, técnicas y de vinculación"
                             loading="lazy">
                    </a>
                    <div class="carousel-caption">
                        <h2 data-aos="fade-up" style="color: #fff;">Historia del ISTAE</h2>
                        <p data-aos="fade-up" data-aos-delay="200">Forjamos futuro con la mente, las manos, la tecnología y la naturaleza</p>
                        <a href="{{ route('history') }}" class="btn btn-primary" data-aos="fade-up" data-aos-delay="400">Ver historia</a>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section" id="about">
      <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="welcome-image">
                        <img src="assets/img/info/rector.jpg" alt="Rector" class="img-fluid rounded-3">
                        <div class="experience-badge">
                            <span class="number">2+</span>
                            <span class="text">Años de Excelencia</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="welcome-content">
                        <div class="section-title">
                            <h6>Mensaje del Rector</h6>
                            <h2>¡Bienvenidos al Instituto Superior Tecnológico Alberto Enríquez!</h2>
                        </div>
                        <p class="lead">Como rector de esta prestigiosa institución, es un honor darles la más cordial bienvenida a nuestra página oficial.</p>
                        <p>El IST Alberto Enríquez se enorgullece de ser un instituto público y gratuito, comprometido con la formación de profesionales de excelencia, capaces de transformar sus comunidades y contribuir al desarrollo del país.</p>
                        <p>Nuestra oferta académica está diseñada para garantizar una educación de calidad, que combina teoría y práctica en un ambiente de aprendizaje dinámico y enriquecedor.</p>
                        <div class="stats-row">
                            <div class="stat-item">
                                <h3>300+</h3>
                                <p>Estudiantes</p>
                            </div>
                            <div class="stat-item">
                                <h3>3</h3>
                                <p>Carreras</p>
                            </div>
                            <div class="stat-item">
                                <h3>100%</h3>
                                <p>Gratuito</p>
                            </div>
                        </div>

                        <div class="organigrama-action">
                            <a href="{{ asset('uploads/infopdf/organiistae.png') }}"
                                class="btn btn-primary"
                                target="_blank">
                                Organigrama Institucional
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Programs Section -->
    <section class="programs-section" id="services">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h6>Descubre tu Futuro</h6>
                <h2>Nuestras Ofertas Académicas</h2>
                <p>Formación profesional de calidad en áreas de alta demanda</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="program-card">
                        <div class="program-image">
                            <img src="{{ asset('assets/img/carrusel/desarrollo-software-2026.webp') }}" alt="Desarrollo de Software" class="img-fluid" loading="lazy">
                            <div class="program-overlay">
                                <a href="{{route('softw_carre')}}" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                        <div class="program-content">
                            <h3>Desarrollo de Software</h3>
                            <p>Crea el futuro digital con nuestra carrera en Desarrollo de Software. Aprende a programar, diseñar y gestionar proyectos tecnológicos innovadores.</p>
                            <ul class="program-features">
                                <li><i class="bi bi-check-circle"></i> Programación Avanzada</li>
                                <li><i class="bi bi-check-circle"></i> Diseño de Sistemas</li>
                                <li><i class="bi bi-check-circle"></i> Gestión de Proyectos</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="program-card">
                        <div class="program-image">
                            <img src="{{ asset('assets/img/carrusel/aprendizaje-territorio-2026.webp') }}" alt="Mecanización Agrícola" class="img-fluid" loading="lazy">
                            <div class="program-overlay">
                                <a href="{{route('agricola_carre')}}" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                        <div class="program-content">
                            <h3>Mecanización Agrícola</h3>
                            <p>Optimiza la producción agrícola con tecnología de vanguardia. Aprende sobre maquinaria moderna y técnicas sostenibles.</p>
                            <ul class="program-features">
                                <li><i class="bi bi-check-circle"></i> Tecnología Agrícola</li>
                                <li><i class="bi bi-check-circle"></i> Gestión de Maquinaria</li>
                                <li><i class="bi bi-check-circle"></i> Agricultura Sostenible</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="program-card">
                        <div class="program-image">
                            <img src="{{ asset('assets/img/carrusel/formacion-automotriz-2026.webp') }}" alt="Mecánica Automotriz" class="img-fluid" loading="lazy">
                            <div class="program-overlay">
                                <a href="{{route('automotriz_carre')}}" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                        <div class="program-content">
                            <h3>Mecánica Automotriz</h3>
                            <p>Domina la tecnología automotriz moderna. Aprende sobre diagnóstico, reparación y mantenimiento de vehículos.</p>
                            <ul class="program-features">
                                <li><i class="bi bi-check-circle"></i> Sistemas Automotrices</li>
                                <li><i class="bi bi-check-circle"></i> Diagnóstico Digital</li>
                                <li><i class="bi bi-check-circle"></i> Tecnología Híbrida</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Editorial and Research Partners Section -->
    <section class="partners-section" aria-labelledby="partners-title">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h6>Cooperación Institucional</h6>
                <h2 id="partners-title">Nuestros aliados editoriales y de investigación</h2>
                <p>Fortalecemos la producción, difusión y visibilidad de la investigación científica mediante alianzas estratégicas.</p>
            </div>

            <div class="row g-4 justify-content-center align-items-stretch">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <a href="https://luminiseditorial.com/"
                       class="partner-card"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Visitar el portal de Luminis Editorial">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/img/aliados/luminis.png') }}"
                                 alt="Logotipo de Luminis Editorial"
                                 class="img-fluid">
                        </div>
                        <h3>Luminis Editorial</h3>
                        <span>Visitar portal <i class="bi bi-box-arrow-up-right"></i></span>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://www.revistasocialfronteriza.com/"
                       class="partner-card"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Visitar el portal de Revista Social Fronteriza">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/img/aliados/social.png') }}"
                                 alt="Logotipo de Revista Social Fronteriza"
                                 class="img-fluid">
                        </div>
                        <h3>Revista Social Fronteriza</h3>
                        <span>Visitar revista <i class="bi bi-box-arrow-up-right"></i></span>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <a href="https://www.reincisol.com/ojs/index.php/reincisol/index"
                       class="partner-card"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Visitar el portal de REINCISOL">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/img/aliados/reincisol.png') }}"
                                 alt="Logotipo de REINCISOL"
                                 class="img-fluid">
                        </div>
                        <h3>REINCISOL</h3>
                        <span>Visitar revista <i class="bi bi-box-arrow-up-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links Section -->
    <section class="quick-links-section" id="featured-services">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h6>Recursos</h6>
                <h2>Enlaces Rápidos</h2>
                <p>Accede a nuestras plataformas y servicios institucionales</p>
      </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>
                        <h4>SIAU 2026</h4>
                        <p>Navegación Digital</p>
                        <a href="assets/filedata/SIAU_2026_Enrollment_Guide.pdf" class="stretched-link"></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-buildings"></i>
                        </div>
                        <h4>Aula Virtual (EVA)</h4>
                        <p>Sistema para la interacción de los alumnos</p>
                        <a href="http://eva.istae.edu.ec/login/index.php" class="stretched-link" target="_blank"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h4>SIGA</h4>
                        <p>Plataforma de seguimiento académico</p>
                        <a href="http://siga.institutos.gob.ec:8080/siga-web/ariel.jsf" class="stretched-link" target="_blank"></a>
                    </div>
        </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-building-gear"></i>
        </div>
                        <h4>ZIMBRA</h4>
          <p>Correo Institucional Senescyt</p>
                        <a href="https://correo.institutos.gob.ec/" class="stretched-link" target="_blank"></a>
                    </div>
        </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h4>Webmail</h4>
                        <p>Correo Institucional ISTAE</p>
                        <a href="https://optimus.myhostingdomain.net:2096/" class="stretched-link" target="_blank"></a>
                    </div>
      </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-book-half"></i>
                        </div>
                        <h4>DATABLUT</h4>
                        <p>Sistema de gestión documental </p>
                        <a href="https://datablut.istae.edu.ec/" class="stretched-link" target="_blank"></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-book"></i>
                       </div>
                        <h4>Biblioteca Virtual</h4>
                        <p>Repositorio Digital ISTAE</p>
                        <a href="https://drive.google.com/drive/folders/1LvYbvyBtGEEnWjGJINQJPP7M9b6TohMF" class="stretched-link" target="_blank"></a>
                   </div>
               </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="700">
                    <div class="quick-link-card">
                        <div class="icon">
                            <i class="bi bi-calendar-day"></i>
                        </div>
                        <h4>Cronograma Académico</h4>
                    IPA2026
                        <a href="assets/documentos/cronograma2026.pdf" class="stretched-link" target="_blank"></a>
                    </div>
</div>
            </div>
        </div>
    </section>

    <!-- Social Media Feed Section -->
    <section class="social-feed-section">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h6>Mantente Conectado</h6>
                <h2>Noticias y Actualizaciones</h2>
                <p>Síguenos en nuestras redes sociales</p>
        </div>
       
            <div class="row g-4">
                @foreach ($datos as $dato)
                    @if (!empty($dato->link_facebook))
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="social-card">
                                <iframe src="{{ $dato->link_facebook }}" 
                                        width="100%" 
                                        height="500" 
                                        style="border:none;overflow:hidden" 
                                        scrolling="no" 
                                        frameborder="0" 
                                        allowfullscreen="true" 
                                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                                </iframe>
                            </div>
                        </div>
    @endif
@endforeach
    </div>
        </div>
    </section>
</main>

<style>
/* Hero Carousel */
.hero-carousel {
    position: relative;
    margin-top: -2rem;
    overflow: hidden;
    background-color: var(--heading-color);
}

.hero-carousel #mainCarousel {
    position: relative;
    isolation: isolate;
}

.hero-carousel .carousel-inner,
.hero-carousel .carousel-item {
    height: 100%;
}

.hero-carousel .carousel-item {
    height: 100vh;
    min-height: 620px;
    overflow: hidden;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}

.hero-carousel .carousel-item::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 1;
    background: linear-gradient(
        90deg,
        rgba(0, 0, 0, 0.72) 0%,
        rgba(0, 0, 0, 0.42) 48%,
        rgba(0, 0, 0, 0.12) 100%
    );
    pointer-events: none;
}

.hero-carousel .carousel-image-link {
    display: block;
    width: 100%;
    height: 100%;
}

.hero-carousel .carousel-visual {
    object-fit: cover;
    height: 100%;
    width: 100%;
    transform: scale(1.02);
    transition: transform 8s ease-out;
}

.hero-carousel .carousel-item.active .carousel-visual {
    transform: scale(1.09);
}

.hero-carousel .carousel-item--contain .carousel-visual {
    object-fit: contain;
}

.hero-carousel .carousel-item--contain.active .carousel-visual {
    transform: scale(1.02);
}

.hero-carousel .carousel-item--magazines {
    background:
        radial-gradient(circle at 82% 30%, var(--accent-color) 0%, transparent 34%),
        linear-gradient(135deg, var(--heading-color) 0%, var(--background-color) 180%);
}

.hero-carousel .magazine-slide-media {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
    width: 100%;
    height: 100%;
    gap: 1rem;
    padding: 5rem 8vw 5rem 60%;
}

.hero-carousel .magazine-logo-card {
    display: flex;
    align-items: center;
    justify-content: center;
    width: min(260px, 100%);
    min-height: 120px;
    padding: 1rem 1.5rem;
    border: 1px solid rgba(255, 255, 255, 0.55);
    border-radius: 18px;
    background-color: rgba(255, 255, 255, 0.94);
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.25);
    transform: rotate(1.5deg);
}

.hero-carousel .magazine-logo-card:nth-child(2) {
    transform: translateX(-2rem) rotate(-1.5deg);
}

.hero-carousel .magazine-logo-card img {
    display: block;
    width: 100%;
    max-width: 220px;
    max-height: 88px;
    object-fit: contain;
}

.hero-carousel .carousel-item--magazines .carousel-caption {
    width: min(600px, calc(100% - 8rem));
    max-width: 600px;
}

.hero-carousel .carousel-caption {
    z-index: 2;
    left: clamp(3rem, 8vw, 10rem);
    right: auto;
    bottom: 50%;
    width: min(760px, calc(100% - 8rem));
    max-width: 760px;
    margin: 0;
    padding: clamp(1.75rem, 3vw, 3rem);
    transform: translateY(50%);
    border-left: 5px solid var(--accent-color);
    border-radius: 0 24px 24px 0;
    background: rgba(0, 0, 0, 0.52);
    box-shadow: 0 24px 60px rgba(0, 0, 0, 0.28);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    text-align: left;
}

.hero-carousel .carousel-caption h2 {
    max-width: 680px;
    margin-bottom: 1rem;
    font-size: clamp(2.25rem, 4vw, 4rem);
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -0.03em;
    text-wrap: balance;
    text-shadow: 0 3px 14px rgba(0, 0, 0, 0.35);
}

.hero-carousel .carousel-caption p {
    max-width: 580px;
    margin-bottom: 1rem;
    font-size: clamp(1.05rem, 1.5vw, 1.3rem);
    line-height: 1.6;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

.hero-carousel .carousel-caption .btn {
    margin-top: 0.75rem;
    padding: 0.8rem 1.6rem;
    border-radius: 999px;
    font-weight: 700;
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.22);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.hero-carousel .carousel-caption .btn:hover,
.hero-carousel .carousel-caption .btn:focus-visible {
    transform: translateY(-3px);
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.28);
}

.hero-carousel .carousel-indicators {
    z-index: 3;
    bottom: 1.75rem;
    gap: 0.55rem;
    margin-bottom: 0;
}

.hero-carousel .carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    margin: 0;
    border: 0;
    border-radius: 999px;
    background-color: #fff;
    opacity: 0.65;
    transition: width 0.3s ease, opacity 0.3s ease, background-color 0.3s ease;
}

.hero-carousel .carousel-indicators .active {
    width: 42px;
    background-color: var(--accent-color);
    opacity: 1;
}

.hero-carousel .carousel-control-prev,
.hero-carousel .carousel-control-next {
    z-index: 3;
    width: 7%;
    min-width: 64px;
    opacity: 1;
}

.hero-carousel .carousel-control-prev-icon,
.hero-carousel .carousel-control-next-icon {
    width: 52px;
    height: 52px;
    padding: 0.85rem;
    border: 1px solid rgba(255, 255, 255, 0.65);
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.32);
    background-size: 42%;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    transition: transform 0.25s ease, background-color 0.25s ease;
}

.hero-carousel .carousel-control-prev:hover .carousel-control-prev-icon,
.hero-carousel .carousel-control-next:hover .carousel-control-next-icon,
.hero-carousel .carousel-control-prev:focus-visible .carousel-control-prev-icon,
.hero-carousel .carousel-control-next:focus-visible .carousel-control-next-icon {
    transform: scale(1.08);
    background-color: var(--accent-color);
}

.hero-carousel button:focus-visible,
.hero-carousel a:focus-visible {
    outline: 3px solid var(--accent-color);
    outline-offset: 4px;
}

/* Welcome Section */
.welcome-section {
    padding: 4rem 0;
    background-color: var(--background-color);
}

.welcome-image {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
}

.experience-badge {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: var(--accent-color);
    color: white;
    padding: 1rem 1.25rem;
    border-radius: 10px;
    text-align: center;
    max-width: calc(100% - 40px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

.experience-badge .number {
    font-size: 2rem;
    font-weight: 700;
    display: block;
}

.welcome-content {
    padding-left: 3rem;
}

.section-title h6 {
    color: var(--accent-color);
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 1rem;
}

.stats-row {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-top: 2rem;
}

.stat-item {
    text-align: center;
}

.organigrama-action {
    margin-top: 1.5rem;
}

.stat-item h3 {
    color: var(--heading-color);
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

/* Programs Section */
.programs-section {
    padding: 4rem 0;
    background-color: #f8f9fa;
}

.program-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
    height: 100%;
    transition: transform 0.3s ease;
}

.program-card:hover {
    transform: translateY(-10px);
}

.program-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.program-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.program-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.program-card:hover .program-overlay {
    opacity: 1;
}

.program-content {
    padding: 2rem;
}

.program-content h3 {
    color: var(--heading-color);
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.program-features {
    list-style: none;
    padding: 0;
    margin: 1rem 0 0;
}

.program-features li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    color: var(--text-color);
}

.program-features i {
    color: var(--accent-color);
}

/* Editorial and Research Partners Section */
.partners-section {
    padding: 4rem 0;
    background-color: var(--background-color);
}

.partners-section .section-title {
    max-width: 850px;
    margin: 0 auto 1.5rem;
    padding-bottom: 0;
}

.partners-section .section-title p {
    margin-bottom: 0;
}

.partner-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    height: 100%;
    padding: 2rem;
    background-color: #ffffff;
    border: 2px solid transparent;
    border-top: 5px solid var(--accent-color);
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    color: var(--text-color);
    text-align: center;
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.partner-card:hover,
.partner-card:focus {
    transform: translateY(-8px);
    border-color: var(--accent-color);
    box-shadow: 0 0 35px rgba(0, 0, 0, 0.16);
    color: var(--text-color);
}

.partner-card:focus-visible {
    outline: 3px solid var(--accent-color);
    outline-offset: 4px;
}

.partner-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 150px;
    margin-bottom: 1.5rem;
}

.partner-logo img {
    display: block;
    max-width: 230px;
    max-height: 130px;
    object-fit: contain;
}

.partner-card h3 {
    margin-bottom: 1rem;
    color: var(--heading-color);
    font-size: 1.35rem;
    font-weight: 700;
}

.partner-card span {
    color: var(--accent-color);
    font-weight: 600;
}

.partner-card span i {
    margin-left: 0.35rem;
}

/* Quick Links Section */
.quick-links-section {
    padding: 4rem 0;
    background-color: var(--background-color);
}

.quick-link-card {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    height: 100%;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    position: relative;
}

.quick-link-card:hover {
    transform: translateY(-5px);
}

.quick-link-card .icon {
    width: 70px;
    height: 70px;
    background: var(--accent-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.quick-link-card .icon i {
    font-size: 2rem;
    color: white;
}

.quick-link-card h4 {
    color: var(--heading-color);
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

/* Social Feed Section */
.social-feed-section {
    padding: 4rem 0;
    background-color: #f8f9fa;
}

.social-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
    height: 100%;
}

/* Responsive Design */
@media (max-width: 991px) {
    .hero-carousel .carousel-item {
        height: 72vh;
        min-height: 560px;
    }

    .hero-carousel .carousel-caption {
        left: 4rem;
        bottom: 50%;
        width: calc(100% - 8rem);
        padding: 1.75rem;
        transform: translateY(50%);
    }

    .hero-carousel .carousel-caption h2 {
        font-size: clamp(2rem, 5vw, 3rem);
    }

    .welcome-content {
        padding-left: 0;
        margin-top: 3rem;
    }

    .stats-row {
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .hero-carousel .carousel-item {
        height: 68vh;
        min-height: 520px;
    }

    .hero-carousel .carousel-item::before {
        background: linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.76) 0%,
            rgba(0, 0, 0, 0.38) 70%,
            rgba(0, 0, 0, 0.16) 100%
        );
    }

    .hero-carousel .magazine-slide-media {
        flex-direction: row;
        align-items: flex-start;
        justify-content: center;
        gap: 0.45rem;
        padding: 4.5rem 1rem 0;
    }

    .hero-carousel .magazine-logo-card {
        width: 31%;
        min-height: 76px;
        padding: 0.6rem;
        border-radius: 12px;
        transform: none;
    }

    .hero-carousel .magazine-logo-card:nth-child(2) {
        transform: none;
    }

    .hero-carousel .magazine-logo-card img {
        max-height: 58px;
    }

    .hero-carousel .carousel-item--magazines .carousel-caption {
        width: calc(100% - 2.5rem);
    }

    .welcome-section,
    .programs-section,
    .quick-links-section,
    .social-feed-section {
        padding: 3rem 0;
    }

    .partners-section {
        padding: 3rem 0;
    }

    .partners-section .section-title {
        margin-bottom: 1rem;
    }

    .partner-logo {
        height: 120px;
    }

    .partner-logo img {
        max-width: 200px;
        max-height: 105px;
    }

    .hero-carousel .carousel-caption {
        left: 1.25rem;
        bottom: 50%;
        width: calc(100% - 2.5rem);
        padding: 1.35rem;
        transform: translateY(50%);
        border-left-width: 4px;
        border-radius: 0 18px 18px 0;
    }

    .hero-carousel .carousel-caption h2 {
        font-size: clamp(1.55rem, 7vw, 2.15rem);
        line-height: 1.12;
    }

    .hero-carousel .carousel-caption p {
        margin-bottom: 0.5rem;
        font-size: 1rem;
        line-height: 1.45;
    }

    .hero-carousel .carousel-caption .btn {
        margin-top: 0.65rem;
        padding: 0.7rem 1.25rem;
    }

    .hero-carousel .carousel-control-prev,
    .hero-carousel .carousel-control-next {
        width: 48px;
        min-width: 48px;
    }

    .hero-carousel .carousel-control-prev-icon,
    .hero-carousel .carousel-control-next-icon {
        width: 40px;
        height: 40px;
    }

    .hero-carousel .carousel-indicators {
        bottom: 1rem;
    }

    .section-title h2 {
        font-size: 2rem;
    }

    .experience-badge {
        right: 10px;
        bottom: 10px;
        padding: 0.75rem 1rem;
    }

    .experience-badge .number {
        font-size: 1.5rem;
    }
}

@media (prefers-reduced-motion: reduce) {
    .hero-carousel .carousel-visual,
    .hero-carousel .carousel-caption .btn,
    .hero-carousel .carousel-indicators [data-bs-target],
    .hero-carousel .carousel-control-prev-icon,
    .hero-carousel .carousel-control-next-icon {
        transition: none;
    }

    .hero-carousel .carousel-item.active .carousel-visual {
        transform: scale(1.02);
    }
}
</style>

@endsection
