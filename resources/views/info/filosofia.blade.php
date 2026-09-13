<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Filosofía Institucional | ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="philosophy-page">
    
    <!-- Hero Section -->
    <section class="philosophy-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <div class="hero-badge">ISTAE</div>
                <h1><i class="bi bi-bank"></i> Filosofía Institucional</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Políticas Institucionales</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="hero-shape-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Misión y Visión Section -->
    <section class="mission-vision-section">
        <div class="container">
            <div class="row g-5">
                <!-- Misión -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="mv-card">
                        <div class="mv-header">
                            <div class="mv-icon">
                                <i class="bi bi-bullseye"></i>
                            </div>
                            <h2>Nuestra Misión</h2>
                        </div>
                        <div class="mv-body">
                            <p>Nuestra misión es forjar profesionales técnicos y tecnólogos con sólidos principios éticos, mediante una educación que fusiona la docencia, la investigación y la vinculación con la sociedad. Nos dedicamos a satisfacer las demandas de los sectores productivos y sociales de San Lorenzo, fomentando activamente el desarrollo de emprendimientos locales.</p>
                            <p>En este compromiso, buscamos no solo proporcionar conocimientos técnicos especializados, sino también cultivar valores éticos que guíen a nuestros graduados hacia una contribución significativa en sus comunidades y en el entorno laboral.</p>
                        </div>
                    </div>
                </div>

                <!-- Visión -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="mv-card">
                        <div class="mv-header">
                            <div class="mv-icon">
                                <i class="bi bi-eye"></i>
                            </div>
                            <h2>Nuestra Visión</h2>
                        </div>
                        <div class="mv-body">
                            <p>Hacia el año 2028, nos consolidaremos como un referente destacado entre los institutos líderes en formación técnica y tecnológica. Orientados por un compromiso inquebrantable, aspiramos a moldear un talento humano analítico, crítico y altamente competitivo.</p>
                            <p>Buscamos contribuir de manera significativa al desarrollo socioeconómico en los ámbitos local, regional y nacional. Nos visualizamos como una institución que no solo se distingue por la excelencia académica, sino también por el impacto positivo que generamos en la sociedad y en la formación de profesionales capaces de afrontar los desafíos del futuro con éxito.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores Section -->
    <section class="institutional-values">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <span class="subtitle">Principios Rectores</span>
                <h2><i class="bi bi-bookmark-star"></i> Nuestros Valores</h2>
                <div class="title-line"></div>
            </div>

            <div class="row g-4 mt-2">
                <!-- Valor 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-person-heart"></i></div>
                        <h4>Respeto</h4>
                        <p>Engloba amabilidad, cordialidad, libertad, tolerancia, comunicación y aceptación de los individuos con sus decisiones en todos los núcleos sociales.</p>
                    </div>
                </div>
                <!-- Valor 2 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="150">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-shield-check"></i></div>
                        <h4>Honestidad</h4>
                        <p>Actuar con sinceridad, decencia, coherencia y rectitud con los seres humanos y el planeta, promoviendo la convivencia armoniosa.</p>
                    </div>
                </div>
                <!-- Valor 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-gem"></i></div>
                        <h4>Integridad</h4>
                        <p>Se nutre de la justicia y lealtad buscando el crecimiento personal y profesional en beneficio común para todos los miembros.</p>
                    </div>
                </div>
                <!-- Valor 4 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="250">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-check-circle"></i></div>
                        <h4>Responsabilidad</h4>
                        <p>Demostrar buenas prácticas humanas, siendo conscientes de los compromisos en el ámbito académico, social, cultural y ambiental.</p>
                    </div>
                </div>
                <!-- Valor 5 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-people"></i></div>
                        <h4>Solidaridad</h4>
                        <p>Brindar apoyo desinteresado, promoviendo la integración entre docentes y estudiantes como también con nuestro entorno.</p>
                    </div>
                </div>
                <!-- Valor 6 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="350">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-hand-thumbs-up"></i></div>
                        <h4>Tolerancia</h4>
                        <p>Promover la igualdad, equidad, la no discriminación y respeto mutuo para crear un ambiente que favorezca el desempeño.</p>
                    </div>
                </div>
                <!-- Valor 7 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-globe"></i></div>
                        <h4>Prevalencia General</h4>
                        <p>Actuar considerando las necesidades y demandas de la sociedad por encima de intereses particulares o individuales.</p>
                    </div>
                </div>
                <!-- Valor 8 -->
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="450">
                    <div class="value-item">
                        <div class="value-accent"></div>
                        <div class="value-icon"><i class="bi bi-lightning"></i></div>
                        <h4>Proactividad</h4>
                        <p>Actitud propositiva de cada individuo que permita acrecentar beneficios dentro y fuera de los institutos educativos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.philosophy-page {
    background-color: var(--background-color);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    color: var(--text-color);
}

/* =========================================
   HERO SECTION
   ========================================= */
.philosophy-hero {
    position: relative;
    background-image: url('assets/img/portfolio/istae.jpeg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 140px 0 100px;
    color: var(--contrast-color);
    z-index: 1;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(var(--heading-color-rgb), 0.92) 0%, rgba(var(--heading-color-rgb), 0.75) 100%);
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
   MISION & VISION
   ========================================= */
.mission-vision-section {
    padding: 80px 0;
}

.mv-card {
    background: var(--contrast-color);
    border-radius: 12px;
    padding: 45px 40px;
    height: 100%;
    box-shadow: 0 10px 40px rgba(0,0,0,0.04);
    border-top: 4px solid var(--accent-color);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mv-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 45px rgba(0,0,0,0.08);
}

.mv-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(0,0,0,0.06);
}

.mv-icon {
    width: 60px;
    height: 60px;
    background: rgba(var(--accent-color-rgb), 0.1);
    color: var(--accent-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
}

.mv-header h2 {
    color: var(--heading-color);
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
}

.mv-body p {
    font-size: 1.05rem;
    line-height: 1.8;
    color: var(--text-color);
    margin-bottom: 15px;
    text-align: justify;
}

.mv-body p:last-child {
    margin-bottom: 0;
}

/* =========================================
   VALORES INSTITUCIONALES
   ========================================= */
.institutional-values {
    padding: 20px 0 80px;
}

.section-title {
    margin-bottom: 50px;
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
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
}

.title-line {
    width: 60px;
    height: 4px;
    background-color: var(--accent-color);
    margin: 0 auto;
    border-radius: 2px;
}

.value-item {
    background: var(--contrast-color);
    border-radius: 12px;
    padding: 35px 25px;
    height: 100%;
    position: relative;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    border: 1px solid rgba(0,0,0,0.04);
    transition: all 0.3s ease;
    overflow: hidden;
}

.value-accent {
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 0;
    background-color: var(--accent-color);
    transition: height 0.3s ease;
}

.value-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.06);
    border-color: rgba(var(--accent-color-rgb), 0.2);
}

.value-item:hover .value-accent {
    height: 100%;
}

.value-icon {
    font-size: 2.2rem;
    color: var(--heading-color);
    margin-bottom: 20px;
    transition: color 0.3s ease;
}

.value-item:hover .value-icon {
    color: var(--accent-color);
}

.value-item h4 {
    color: var(--heading-color);
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.value-item p {
    color: var(--text-color);
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

/* =========================================
   RESPONSIVE
   ========================================= */
@media (max-width: 991px) {
    .philosophy-hero { padding: 120px 0 80px; }
    .hero-content h1 { font-size: 2.8rem; }
    .mv-card { padding: 35px 25px; }
}

@media (max-width: 768px) {
    .hero-content h1 { font-size: 2.2rem; flex-direction: column; gap: 10px; }
    .section-title h2 { font-size: 2rem; }
    .mission-vision-section { padding: 50px 0; }
    .institutional-values { padding: 10px 0 60px; }
    .mv-header { flex-direction: column; text-align: center; }
    .mv-body p { text-align: left; }
}
</style>

@endsection
