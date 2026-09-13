@extends('layouts.app')

@section('title', 'Aseguramiento de Calidad | ISTAE')

@section('content')
<style>
.calidad-page {
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

        .calidad-page {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* HERO SECTION */
        .calidad-hero {
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
            padding: 14px 32px;
            font-size: 1.05rem;
            font-weight: 700;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 184, 244, 0.35);
            text-decoration: none;
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

        /* DOCUMENT CARDS OFICIALES */
        .doc-featured-card {
            background: var(--contrast-color);
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .doc-featured-card h3 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--heading-color);
            margin-bottom: 15px;
        }
        .doc-featured-card p {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--text-color);
            margin-bottom: 25px;
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
            .calidad-hero { padding: 130px 0 90px; }
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

<div class="calidad-page">

    <!-- Hero Section -->
    <section class="calidad-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">Gestión Institucional</div>
                <h1><i class="bi bi-check2-all"></i> Aseguramiento de Calidad</h1>
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Gestión Institucional</a></li>
                        <li class="breadcrumb-item active">Aseguramiento de Calidad</li>
                    </ol>
                </nav>

                <div class="hero-action mt-4">
                    <a href="#documentos-calidad" class="btn btn-institutional">
                        <i class="bi bi-journal-check"></i> Ver Documentación Oficial
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
                            <span class="subtitle">Excelencia Educativa</span>
                            <h2>Sistema de Gestión de Calidad</h2>
                            <div class="title-line"></div>
                        </div>

                        <div class="editorial-card">
                            <div class="editorial-text">
                                <p class="lead-text">El Aseguramiento de la Calidad en el Instituto Superior Tecnológico Alberto Enríquez constituye el pilar estratégico para evaluar, consolidar y perfeccionar continuamente todos los procesos sustantivos de la institución.</p>
                            </div>

                            <blockquote class="institutional-quote">
                                <i class="bi bi-quote quote-icon"></i>
                                <div class="quote-content">
                                    <p>La calidad institucional es un compromiso permanente de autoevaluación, transparencia y superación constante para brindar a nuestros tecnólogos una educación con los más altos estándares nacionales.</p>
                                </div>
                            </blockquote>

                            <div class="editorial-text">
                                <p>Mediante el acoplamiento del Ciclo de Deming y las guías del modelo de evaluación externa, garantizamos la pertinencia pedagógica, la optimización administrativa y el cumplimiento de los estándares exigidos por los órganos rectores de la educación superior.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DOCUMENTOS OFICIALES DE CALIDAD -->
            <div id="documentos-calidad" class="mt-5 pt-4">
                <div class="section-title text-center">
                    <span class="subtitle">Documentación Reglamentaria</span>
                    <h2><i class="bi bi-file-earmark-text"></i> Modelos y Guías Oficiales</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Documento 1: Ciclo de Deming -->
                    <div class="col-lg-5 col-md-6">
                        <div class="doc-featured-card">
                            <div>
                                <span class="badge bg-primary px-3 py-2 rounded-pill mb-3" style="font-size: 0.8rem; letter-spacing: 1px;">AUTOEVALUACIÓN</span>
                                <h3>Ciclo de Deming</h3>
                                <p>Ciclo de Deming acoplado a la autoevaluación del ISTAE, permitiendo planificar, hacer, verificar y actuar para la mejora institucional continua.</p>
                            </div>
                            <div class="pt-3">
                                <a href="https://www.istae.edu.ec/ver-archivo/uploads/Aseguramiento%20de%20Calidad/1758603702_1757545371_Imagen%20de%20WhatsApp%202025-09-10%20a%20las%2014.35.56_3f0972a5.jpg" target="_blank" class="btn btn-institutional w-100 justify-content-center">
                                    <i class="bi bi-file-earmark-image"></i> Ver Documento
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Documento 2: Guía de Evaluación Externa -->
                    <div class="col-lg-5 col-md-6">
                        <div class="doc-featured-card">
                            <div>
                                <span class="badge bg-info text-dark px-3 py-2 rounded-pill mb-3" style="font-size: 0.8rem; letter-spacing: 1px;">EVALUACIÓN EXTERNA</span>
                                <h3>Guía del Modelo</h3>
                                <p>Guía del Modelo de Evaluación externa institucional para institutos superiores técnicos y tecnológicos del CACES.</p>
                            </div>
                            <div class="pt-3">
                                <a href="https://www.istae.edu.ec/ver-archivo/uploads/Aseguramiento%20de%20Calidad/1758603801_6_1757545255_Gui%CC%81a%20del%20Modelo%20de%20Evaluacio%CC%81n%20externa.pdf" target="_blank" class="btn btn-institutional w-100 justify-content-center">
                                    <i class="bi bi-file-earmark-pdf"></i> Ver Documento PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pilares del Sistema de Calidad -->
            <div class="values-block mt-5 pt-4">
                <div class="section-title text-center">
                    <span class="subtitle">Pilares Fundamentales</span>
                    <h2><i class="bi bi-layers"></i> Ejes de Aseguramiento</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row g-4 mt-2 justify-content-center">
                    <!-- Pilar 1 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-book"></i></div>
                            <h3 class="ec-title">Calidad Académica</h3>
                            <p class="ec-desc">Revisión periódica de mallas curriculares, desempeño del personal docente y recursos didácticos de vanguardia.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Pilar 2 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-diagram-3"></i></div>
                            <h3 class="ec-title">Gestión Eficiente</h3>
                            <p class="ec-desc">Optimización continua de procesos administrativos y transparencia en la rendición de cuentas institucional.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Pilar 3 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-globe2"></i></div>
                            <h3 class="ec-title">Impacto Social</h3>
                            <p class="ec-desc">Medición sistemática del efecto de las prácticas pre profesionales y proyectos comunitarios en el entorno.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Pilar 4 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-arrow-repeat"></i></div>
                            <h3 class="ec-title">Autoevaluación</h3>
                            <p class="ec-desc">Procesos permanentes y participativos para identificar oportunidades y diseñar planes de fortalecimiento.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Pilar 5 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-shield-check"></i></div>
                            <h3 class="ec-title">Acreditación CACES</h3>
                            <p class="ec-desc">Cumplimiento riguroso de los estándares nacionales de acreditación para la educación superior técnica.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Pilar 6 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <h3 class="ec-title">Mejora Continua</h3>
                            <p class="ec-desc">Implementación y seguimiento de planes de mejora con metas concretas e indicadores verificables.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
