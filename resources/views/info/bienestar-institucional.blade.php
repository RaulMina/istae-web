@extends('layouts.app')

@section('title', 'Bienestar Institucional | ISTAE')

@section('content')
<style>
.bienestar-page {
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

        .bienestar-page {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        /* HERO SECTION */
        .bienestar-hero {
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

        /* PLAN DE IGUALDAD DESTACADO */
        .plan-igualdad-card {
            background: var(--contrast-color);
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 40px;
            text-align: center;
        }
        .plan-igualdad-card h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--heading-color);
            margin-bottom: 15px;
        }
        .plan-igualdad-card p {
            font-size: 1.05rem;
            line-height: 1.75;
            color: var(--text-color);
            max-width: 800px;
            margin: 0 auto 25px;
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

        /* BUZON DE SUGERENCIAS */
        .buzon-block {
            background: var(--contrast-color);
            border-radius: 8px;
            padding: 45px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.05);
            max-width: 850px;
            margin: 50px auto 0;
        }
        .form-control-institutional {
            width: 100%;
            padding: 14px 18px;
            border-radius: 8px;
            border: 1.5px solid rgba(21, 101, 192, 0.15);
            background: #ffffff;
            color: var(--text-color);
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        .form-control-institutional:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(0, 184, 244, 0.15);
        }

        @media (max-width: 991px) {
            .bienestar-hero { padding: 130px 0 90px; }
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
            .buzon-block { padding: 30px 20px; }
        }
</style>

<div class="bienestar-page">

    <!-- Hero Section -->
    <section class="bienestar-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">Gestión Institucional</div>
                <h1><i class="bi bi-heart-pulse"></i> Bienestar Institucional</h1>
                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Gestión Institucional</a></li>
                        <li class="breadcrumb-item active">Bienestar Institucional</li>
                    </ol>
                </nav>

                <div class="hero-action mt-4">
                    <a href="https://www.istae.edu.ec/ver-archivo/uploads/Bienestar%20Institucional/1763045200_PLAN%20DE%20IGUALDAD%20INSTITUCIONAL.pdf" target="_blank" class="btn btn-institutional">
                        <i class="bi bi-file-earmark-pdf"></i> Acceder al Plan de Igualdad
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
                            <span class="subtitle">Desarrollo Humano Integral</span>
                            <h2>Bienestar Institucional</h2>
                            <div class="title-line"></div>
                        </div>

                        <div class="editorial-card">
                            <div class="editorial-text">
                                <p class="lead-text">La Dirección de Bienestar Institucional del ISTAE tiene como misión fundamental promover el desarrollo integral de la comunidad educativa, asegurando un ambiente propicio para el aprendizaje, la salud, la equidad de género y la convivencia armónica.</p>
                            </div>

                            <blockquote class="institutional-quote">
                                <i class="bi bi-quote quote-icon"></i>
                                <div class="quote-content">
                                    <p>El bienestar institucional es el corazón de nuestra comunidad educativa, garantizando igualdad de oportunidades, salud mental y física, e inclusión para cada estudiante y colaborador del instituto.</p>
                                </div>
                            </blockquote>

                            <div class="editorial-text">
                                <p>Brindamos acompañamiento permanente mediante servicios de asesoría psicopedagógica, orientación vocacional, programas deportivos, culturales, y la gestión oportuna de becas y ayudas socioeconómicas para que ningún estudiante interrumpa su formación académica.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PLAN DE IGUALDAD OFICIAL -->
            <div class="mt-5 pt-4">
                <div class="section-title text-center">
                    <span class="subtitle">Documento Oficial Obligatorio</span>
                    <h2><i class="bi bi-award"></i> Plan de Igualdad Institucional</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="plan-igualdad-card">
                            <span class="badge bg-primary px-3 py-2 rounded-pill mb-3" style="font-size: 0.8rem; letter-spacing: 1px;">DOCUMENTO VIGENTE</span>
                            <h3>Plan de Igualdad del ISTAE</h3>
                            <p>El Plan de Igualdad del ISTAE es un documento que reúne las acciones y compromisos del instituto para asegurar que mujeres y hombres tengan las mismas oportunidades en todos los ámbitos de la vida académica y laboral.</p>
                            <a href="https://www.istae.edu.ec/ver-archivo/uploads/Bienestar%20Institucional/1763045200_PLAN%20DE%20IGUALDAD%20INSTITUCIONAL.pdf" target="_blank" class="btn btn-institutional">
                                <i class="bi bi-file-earmark-pdf"></i> Ver Documento Oficial
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ejes de Bienestar Institucional -->
            <div class="values-block mt-4 pt-4">
                <div class="section-title text-center">
                    <span class="subtitle">Áreas de Acompañamiento</span>
                    <h2><i class="bi bi-heart-pulse"></i> Ejes de Servicios</h2>
                    <div class="title-line"></div>
                </div>

                <div class="row g-4 mt-2 justify-content-center">
                    <!-- Eje 1 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-person-hearts"></i></div>
                            <h3 class="ec-title">Apoyo Psicológico</h3>
                            <p class="ec-desc">Atención confidencial, orientación emocional y talleres de manejo del estrés para toda la comunidad.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Eje 2 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-mortarboard"></i></div>
                            <h3 class="ec-title">Becas y Ayudas</h3>
                            <p class="ec-desc">Gestión y seguimiento de incentivos socioeconómicos para garantizar la permanencia y graduación.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Eje 3 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-universal-access"></i></div>
                            <h3 class="ec-title">Inclusión y Equidad</h3>
                            <p class="ec-desc">Promoción de un campus libre de discriminación con igualdad de oportunidades y accesibilidad.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Eje 4 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-heart-pulse"></i></div>
                            <h3 class="ec-title">Salud Preventiva</h3>
                            <p class="ec-desc">Campañas de prevención médica, primeros auxilios y promoción de hábitos saludables.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Eje 5 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-trophy"></i></div>
                            <h3 class="ec-title">Deporte y Recreación</h3>
                            <p class="ec-desc">Torneos interinstitucionales y actividades deportivas que fomentan el trabajo en equipo y vitalidad.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>

                    <!-- Eje 6 -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ethics-card">
                            <div class="ec-icon"><i class="bi bi-palette"></i></div>
                            <h3 class="ec-title">Arte y Cultura</h3>
                            <p class="ec-desc">Espacios de expresión artística, música y danza para enriquecer la vida universitaria integral.</p>
                            <div class="ec-line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BUZÓN DE SUGERENCIAS -->
            <div class="buzon-block">
                <div class="section-title text-center mb-4">
                    <span class="subtitle">Participación Comunitaria</span>
                    <h2 style="font-size: 2rem;"><i class="bi bi-envelope-paper-heart"></i> Buzón de Sugerencias</h2>
                    <div class="title-line"></div>
                </div>
                <p class="text-center mb-4" style="color: var(--text-color);">Déjanos tus inquietudes o propuestas para continuar mejorando los servicios que brindamos.</p>
                
                <form action="{{ route('istaepost') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: var(--heading-color);"><i class="bi bi-person"></i> Nombres y Apellidos</label>
                        <input type="text" name="nombre" class="form-control-institutional" placeholder="Ej. Juan Pérez" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: var(--heading-color);"><i class="bi bi-envelope"></i> Correo Electrónico</label>
                        <input type="email" name="email" class="form-control-institutional" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: var(--heading-color);"><i class="bi bi-chat-dots"></i> Mensaje o Sugerencia</label>
                        <textarea name="smsg" rows="4" class="form-control-institutional" placeholder="Describe tu sugerencia aquí..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-institutional w-100 justify-content-center">
                        <i class="bi bi-send-fill"></i> Enviar Mensaje
                    </button>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection
