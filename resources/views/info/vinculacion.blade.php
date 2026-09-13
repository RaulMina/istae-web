@extends('layouts.app')

@section('title', 'Vinculación con la Sociedad | ISTAE')

@section('content')
<style>
.vinculacion-page {
            --background-color: #f0f8ff !important;
            --default-color: #234567 !important;
            --heading-color: #1565c0 !important;
            --heading-color-rgb: 21, 101, 192 !important;
            --contrast-color: #ffffff !important;
            --accent-color: #00b8f4 !important;
            --accent-color-rgb: 0, 184, 244 !important;
            --text-color: #234567 !important;
        }

        /* Visibilidad total inmediata */
        [data-aos] {
            opacity: 1 !important;
            transform: none !important;
            visibility: visible !important;
        }

        .vinculacion-page {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* HERO SECTION */
        .vinculacion-hero {
            position: relative;
            background-image: url('{{ asset('assets/img/portfolio/istae.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 150px 0 110px;
            color: var(--contrast-color);
            z-index: 1;
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
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
            border-radius: 24px;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 2px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            color: #ffffff;
        }
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            letter-spacing: 0;
            color: #ffffff !important;
        }
        .breadcrumb {
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 10px 24px;
            border-radius: 24px;
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
        .breadcrumb-item a:hover { opacity: 1; }
        .breadcrumb-item.active {
            color: var(--accent-color);
            font-weight: 600;
        }
        .btn-institutional {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background-color: #00b8f4;
            color: #ffffff;
            border: 2px solid #00b8f4;
            padding: 16px 36px;
            font-size: 1.15rem;
            font-weight: 700;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 184, 244, 0.35);
            text-decoration: none;
            letter-spacing: 0.3px;
        }
        .btn-institutional:hover {
            background-color: #00b8f4;
            color: #ffffff;
            border-color: #00b8f4;
            box-shadow: 0 8px 30px rgba(0, 184, 244, 0.5);
            transform: translateY(-3px);
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
            height: 56px;
        }
        .hero-shape-divider .shape-fill {
            fill: var(--background-color);
        }

        /* EDITORIAL BLOCK */
        .editorial-content {
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
        .editorial-card {
            background: var(--contrast-color);
            border-radius: 8px;
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

        /* PROYECTO DESTACADO OFICIAL */
        .featured-project-card {
            background: var(--contrast-color);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 60px;
        }
        .featured-project-img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            display: block;
        }
        .featured-project-body {
            padding: 40px;
        }
        .featured-badge {
            display: inline-block;
            background: rgba(var(--accent-color-rgb), 0.12);
            color: var(--heading-color);
            padding: 6px 18px;
            border-radius: 24px;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        .featured-project-body h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--heading-color);
            margin-bottom: 16px;
            line-height: 1.3;
        }
        .featured-project-body p {
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--text-color);
            margin: 0;
        }

        /* GRID DE CARDS */
        .ethics-card {
            background: var(--contrast-color);
            padding: 35px 30px;
            border-radius: 8px;
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
            border-radius: 8px;
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

        @media (max-width: 991px) {
            .vinculacion-hero { padding: 130px 0 90px; }
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

<div class="vinculacion-page">

    <!-- Hero Section -->
    <section class="vinculacion-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">Gestión Institucional</div>
                <h1><i class="bi bi-link-45deg"></i> Vinculación</h1>
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Gestión Institucional</a></li>
                        <li class="breadcrumb-item active">Vinculación</li>
                    </ol>
                </nav>

                <div class="hero-action mt-4">
                    <a href="#proyectos-oficiales" class="btn btn-institutional">
                        <i class="bi bi-eye"></i> Ver Proyectos Comunitarios
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
    <section class="editorial-content">
        <div class="container">
            
            <!-- Introducción Editorial -->
            <div class="editorial-block">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center">
                            <span class="subtitle">Compromiso Comunitario</span>
                            <h2>Vinculación con la Sociedad</h2>
                            <div class="title-line"></div>
                        </div>

                        <div class="editorial-card">
                            <div class="editorial-text">
                                <p class="lead-text">La Vinculación con la Sociedad en el Instituto Superior Tecnológico Alberto Enríquez es el eje articulador que conecta las aulas con las realidades y necesidades de los sectores productivos y sociales de San Lorenzo y la región norte del país.</p>
                            </div>

                            <blockquote class="institutional-quote">
                                <i class="bi bi-quote quote-icon"></i>
                                <div class="quote-content">
                                    <p>La vinculación con la sociedad es el puente que transforma el conocimiento técnico y tecnológico en soluciones prácticas y sostenibles para mejorar la calidad de vida de nuestra comunidad.</p>
                                </div>
                            </blockquote>

                            <div class="editorial-text">
                                <p>A través de la ejecución activa de proyectos integrales, nuestros docentes y estudiantes aplican sus competencias en beneficio del entorno, promoviendo la equidad, el desarrollo local y el fortalecimiento de la infraestructura y capital humano de las instituciones beneficiarias.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROYECTO OFICIAL DESTACADO -->
            <div id="proyectos-oficiales" class="mt-5 pt-4">
                <div class="section-title text-center">
                    <span class="subtitle">Evidencia Institucional</span>
                    <h2><i class="bi bi-folder-check"></i> Proyecto Comunitario</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="featured-project-card">
                            <img src="https://www.istae.edu.ec/ver-archivo/uploads/Vinculaci%C3%B3n/1759419938_Imagen%20de%20WhatsApp%202025-10-02%20a%20las%2010.44.45_495919fb.jpg" alt="Mejoramiento de Infraestructura Técnico San Lorenzo" class="featured-project-img">
                            <div class="featured-project-body">
                                <span class="featured-badge"><i class="bi bi-tools"></i> Proyecto Oficial de Vinculación</span>
                                <h3>MEJORAMIENTO DE INFRAESTRUCTURA DE LA UNIDAD EDUCATICA "TECNICO SAN LORENZO"</h3>
                                <p>Se realizaron las siguientes actividades de diagnóstico, mantenimiento y adecuación de espacios pedagógicos para beneficiar a la comunidad educativa de la Unidad Educativa "Técnico San Lorenzo", reafirmando nuestro compromiso con el desarrollo de la educación técnica.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Líneas de Vinculación -->
            <div class="values-block mt-4 pt-4">
                <div class="section-title text-center">
                    <span class="subtitle">Ejes de Acción</span>
                    <h2><i class="bi bi-diagram-3"></i> Líneas Estratégicas</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row g-4 mt-2 justify-content-center">
                    <!-- Card 1 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-building"></i></div>
                            <h3 class="ec-title">Extensión Comunitaria</h3>
                            <p class="ec-desc">Atención directa a las necesidades de infraestructura y servicios de las poblaciones locales de San Lorenzo.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-cpu"></i></div>
                            <h3 class="ec-title">Transferencia Tecnológica</h3>
                            <p class="ec-desc">Implementación de soluciones técnicas orientadas a la optimización de procesos en sectores productivos.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-book"></i></div>
                            <h3 class="ec-title">Educación Continua</h3>
                            <p class="ec-desc">Talleres y cursos de capacitación para potenciar los oficios y destrezas de la ciudadanía.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-tree"></i></div>
                            <h3 class="ec-title">Desarrollo Sostenible</h3>
                            <p class="ec-desc">Prácticas alineadas a la conservación del medio ambiente y el uso eficiente de recursos locales.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-lightbulb"></i></div>
                            <h3 class="ec-title">Emprendimiento Social</h3>
                            <p class="ec-desc">Asesoría e impulso a iniciativas productivas para dinamizar la economía comunitaria.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-bezier2"></i></div>
                            <h3 class="ec-title">Alianzas Interinstitucionales</h3>
                            <p class="ec-desc">Cooperación con entidades públicas y privadas para potenciar el impacto de los proyectos.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
