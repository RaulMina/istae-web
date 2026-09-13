<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Código de Ética | ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="ethics-page">
    
    <!-- Hero Section -->
    <section class="ethics-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <div class="hero-badge">Institucional</div>
                <h1><i class="bi bi-shield-check"></i> Código de Ética</h1>
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Código de Ética</li>
                    </ol>
                </nav>

                <div class="hero-action mt-4">
                    <a href="assets/filedata/CODIGO_DE_ETICA_INSTITUCIONAL .pdf" class="btn btn-institutional" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i> Acceder al Código de Ética
                    </a>
                </div>
            </div>
        </div>
        <div class="hero-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Content Sections -->
    <section class="ethics-content">
        <div class="container">
            
            <!-- Introducción Editorial -->
            <div class="editorial-block" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center">
                            <span class="subtitle">Documento Oficial</span>
                            <h2>Ética Institucional</h2>
                            <div class="title-line"></div>
                        </div>

                        <div class="editorial-card">
                            <div class="editorial-text">
                                <p class="lead-text">Hacia el año 2028, nos consolidaremos como un referente destacado entre los institutos líderes en formación técnica y tecnológica. Orientados por un compromiso inquebrantable, aspiramos a moldear un talento humano analítico, crítico y altamente competitivo. Buscamos contribuir de manera significativa al desarrollo socioeconómico en los ámbitos local, regional y nacional.</p>
                            </div>

                            <blockquote class="institutional-quote">
                                <i class="bi bi-quote quote-icon"></i>
                                <div class="quote-content">
                                    <p>El código de ética es un instrumento que permite desarrollar una cultura de principios y valores imprescindibles para una adecuada convivencia social dentro y fuera del campus académico.</p>
                                </div>
                            </blockquote>

                            <div class="editorial-text">
                                <p>El código de ética es solo un instrumento que señala la dirección a seguir en la búsqueda y contribución al bien común, pero solo su aceptación como responsabilidad personal permitirá que el talento ético se concrete como ejercicio libre y responsable del miembro de la comunidad del Instituto Superior Tecnológico.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Valores Éticos -->
            <div class="values-block mt-5 pt-5" data-aos="fade-up">
                <div class="section-title text-center">
                    <h2><i class="bi bi-bookmark-heart"></i> Valores Éticos</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row g-4 mt-3 justify-content-center">
                    <!-- Valor 1 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-shield-lock"></i></div>
                            <h3 class="ec-title">Ética y Responsabilidad</h3>
                            <p class="ec-desc">Compromiso con principios morales sólidos y responsabilidad en todas las actividades académicas y profesionales.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Valor 2 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-lightbulb"></i></div>
                            <h3 class="ec-title">Innovación y Excelencia</h3>
                            <p class="ec-desc">Impulso hacia la excelencia académica mediante la integración de prácticas innovadoras en enseñanza e investigación.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Valor 3 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-people"></i></div>
                            <h3 class="ec-title">Compromiso con la Comunidad</h3>
                            <p class="ec-desc">Dedicación a satisfacer las necesidades de los sectores productivos y sociales locales para el bienestar comunitario.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Valor 4 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-person-check"></i></div>
                            <h3 class="ec-title">Formación Integral</h3>
                            <p class="ec-desc">Enfoque en el desarrollo completo de los estudiantes, combinando conocimientos técnicos con habilidades críticas.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Valor 5 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-tree"></i></div>
                            <h3 class="ec-title">Desarrollo Sostenible</h3>
                            <p class="ec-desc">Promoción de prácticas y soluciones que apoyen el crecimiento económico y social de manera equilibrada y respetuosa.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Valor 6 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-bezier2"></i></div>
                            <h3 class="ec-title">Colaboración y Vinculación</h3>
                            <p class="ec-desc">Fomento de la cooperación entre la institución, estudiantes, sector productivo y la comunidad.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Valor 7 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-compass"></i></div>
                            <h3 class="ec-title">Adaptabilidad y Futuro</h3>
                            <p class="ec-desc">Preparación de los estudiantes para enfrentar desafíos futuros con habilidades adaptables y una mentalidad proactiva.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.ethics-page {
    background-color: var(--background-color);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    color: var(--text-color);
}

/* =========================================
   HERO SECTION
   ========================================= */
.ethics-hero {
    position: relative;
    background-image: url('assets/img/portfolio/istae.jpeg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 150px 0 110px;
    color: var(--contrast-color);
    z-index: 1;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(var(--heading-color-rgb), 0.95) 0%, rgba(var(--heading-color-rgb), 0.8) 100%);
    z-index: -1;
}

.hero-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.hero-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(5px);
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 2px;
    margin-bottom: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-transform: uppercase;
}

.hero-content h1 {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    letter-spacing: -0.02em;
}

.breadcrumb {
    justify-content: center;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 10px 24px;
    border-radius: 50px;
    display: inline-flex;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.breadcrumb-item a {
    color: var(--contrast-color);
    opacity: 0.8;
    text-decoration: none;
    font-weight: 500;
    transition: opacity 0.3s ease;
}

.breadcrumb-item a:hover {
    opacity: 1;
}

.breadcrumb-item.active {
    color: var(--accent-color);
    font-weight: 600;
}

.btn-institutional {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background-color: transparent;
    color: var(--contrast-color);
    border: 2px solid var(--accent-color);
    padding: 12px 28px;
    font-size: 1.05rem;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-institutional:hover {
    background-color: var(--accent-color);
    color: var(--contrast-color);
    box-shadow: 0 8px 20px rgba(var(--accent-color-rgb), 0.3);
    transform: translateY(-2px);
}

.hero-shape-divider {
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.hero-shape-divider svg {
    position: relative;
    display: block;
    width: calc(100% + 1.3px);
    height: 60px;
}

.hero-shape-divider .shape-fill {
    fill: var(--background-color);
}

/* =========================================
   SECTIONS & TITLES
   ========================================= */
.ethics-content {
    padding: 70px 0;
}

.section-title {
    margin-bottom: 40px;
}

.section-title .subtitle {
    display: block;
    color: var(--accent-color);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.section-title h2 {
    color: var(--heading-color);
    font-size: 2.4rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.title-line {
    width: 60px;
    height: 4px;
    background-color: var(--accent-color);
    margin: 0 auto;
    border-radius: 2px;
}

/* =========================================
   EDITORIAL BLOCK (INTRODUCCIÓN)
   ========================================= */
.editorial-card {
    background: var(--contrast-color);
    border-radius: 12px;
    padding: 50px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.03);
    border: 1px solid rgba(0,0,0,0.04);
}

.editorial-text p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-color);
    margin-bottom: 0;
    text-align: justify;
}

.editorial-text .lead-text {
    font-size: 1.15rem;
    font-weight: 500;
    color: var(--heading-color);
}

.institutional-quote {
    position: relative;
    background: rgba(var(--heading-color-rgb), 0.03);
    border-left: 4px solid var(--accent-color);
    padding: 35px 40px;
    margin: 40px 0;
    border-radius: 0 12px 12px 0;
}

.quote-icon {
    position: absolute;
    top: 25px;
    left: 20px;
    font-size: 2.5rem;
    color: rgba(var(--accent-color-rgb), 0.2);
}

.quote-content p {
    font-size: 1.25rem;
    font-style: italic;
    font-weight: 500;
    color: var(--heading-color);
    line-height: 1.7;
    margin: 0;
    padding-left: 30px;
    text-align: left;
}

/* =========================================
   CARDS DE VALORES ÉTICOS
   ========================================= */
.ethics-card {
    background: var(--contrast-color);
    padding: 35px 30px;
    border-radius: 12px;
    height: 100%;
    position: relative;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    border: 1px solid rgba(0,0,0,0.04);
    transition: all 0.3s ease;
}

.ec-line {
    position: absolute;
    bottom: 0;
    left: 30px;
    right: 30px;
    height: 3px;
    background-color: var(--accent-color);
    transform: scaleX(0);
    transition: transform 0.3s ease;
    border-radius: 3px 3px 0 0;
}

.ethics-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.06);
    border-color: rgba(var(--accent-color-rgb), 0.2);
}

.ethics-card:hover .ec-line {
    transform: scaleX(1);
}

.ec-icon {
    font-size: 2.2rem;
    color: var(--accent-color);
    margin-bottom: 20px;
    display: inline-block;
    padding: 12px;
    background: rgba(var(--accent-color-rgb), 0.1);
    border-radius: 10px;
    line-height: 1;
}

.ec-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--heading-color);
    margin-bottom: 15px;
}

.ec-desc {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--text-color);
    margin: 0;
}

/* =========================================
   RESPONSIVE
   ========================================= */
@media (max-width: 991px) {
    .ethics-hero { padding: 130px 0 90px; }
    .hero-content h1 { font-size: 2.8rem; }
    .editorial-card { padding: 35px; }
    .institutional-quote { padding: 25px 30px; }
}

@media (max-width: 768px) {
    .hero-content h1 { font-size: 2.2rem; flex-direction: column; gap: 10px; }
    .section-title h2 { font-size: 2rem; }
    .editorial-card { padding: 25px 20px; }
    .editorial-text p, .quote-content p { text-align: left; }
    .btn-institutional { width: 100%; justify-content: center; }
    .ethics-card { padding: 25px; }
    .ec-line { left: 20px; right: 20px; }
}
</style>

@endsection
