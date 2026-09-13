    <!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Mecanización Agrícola | ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<style>
    /* Estilos únicos para Mecanización Agrícola */
    .career-hero.agricultural {
        background-attachment: fixed;
        position: relative;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 60vh;
        display: flex;
        align-items: center;
    }

    .career-hero.agricultural .overlay {
        background: linear-gradient(45deg, rgba(0,0,0,0.85) 0%, rgba(76,175,80,0.85) 100%);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .career-hero.agricultural .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .career-hero.agricultural .hero-content h1 {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .career-hero.agricultural .breadcrumb {
        background: rgba(255,255,255,0.1);
        padding: 0.75rem 1rem;
        border-radius: 50px;
        display: inline-flex;
        margin: 0;
    }

    .career-hero.agricultural .breadcrumb-item,
    .career-hero.agricultural .breadcrumb-item a {
        color: white;
        font-weight: 500;
    }

    .career-hero.agricultural .breadcrumb-item.active {
        color: rgba(255,255,255,0.8);
    }

    .career-hero.agricultural .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,0.8);
    }

    .info-card.agricultural {
        border: none;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .info-card.agricultural:hover {
        transform: translateY(-5px);
    }

    .stats-card.agricultural {
        background: linear-gradient(135deg, #2e7d32 0%, #81c784 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
    }

    .stats-card.agricultural .progress {
        height: 8px;
        background-color: rgba(255,255,255,0.2);
    }

    .stats-card.agricultural .progress-bar {
        background-color: #1b5e20;
    }

    .competency-card.agricultural {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .competency-card.agricultural:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .competency-card.agricultural .icon {
        background: linear-gradient(45deg, #4caf50 0%, #2e7d32 100%);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .advantage-item.agricultural {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid #4caf50;
        transition: all 0.3s ease;
    }

    .advantage-item.agricultural:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .facilities-content.agricultural {
        background: #f1f8e9;
        border-radius: 15px;
        overflow: hidden;
    }

    .job-category.agricultural {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-top: 4px solid #4caf50;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
</style>

<main class="main">
    <!-- Hero Section -->
    <section class="career-hero agricultural" style="background-image: url('assets/img/info/s2.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1 class="display-4 fw-bold">Tecnología Superior en Mecanización Agrícola</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#careers">Carreras</a></li>
                        <li class="breadcrumb-item active">Mecanización Agrícola</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Career Overview -->
    <section class="career-overview py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Career Info Card -->
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="info-card agricultural">
                        <div class="card-image position-relative">
                            <img src="assets/img/info/s2.jpg" alt="Mecanización Agrícola" class="img-fluid">
                            <div class="approval-badge">
                                <i class="bi bi-patch-check-fill"></i>
                                <span>Aprobada por el CES</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-item d-flex align-items-center mb-3">
                                <i class="bi bi-calendar-check fs-4 me-3 text-success"></i>
                                <div>
                                    <h5 class="mb-0">Duración</h5>
                                    <p class="mb-0">4 Semestres</p>
                                </div>
                            </div>
                            <div class="info-item d-flex align-items-center mb-3">
                                <i class="bi bi-mortarboard fs-4 me-3 text-success"></i>
                                <div>
                                    <h5 class="mb-0">Modalidad</h5>
                                    <p class="mb-0">Presencial</p>
                                </div>
                            </div>
                            <div class="info-item d-flex align-items-center mb-3">
                                <i class="bi bi-cash-coin fs-4 me-3 text-success"></i>
                                <div>
                                    <h5 class="mb-0">Matrícula</h5>
                                    <p class="mb-0">Gratuita</p>
                                </div>
                            </div>
                            <div class="info-item d-flex align-items-center mb-4">
                                <i class="bi bi-file-earmark-text fs-4 me-3 text-success"></i>
                                <div>
                                    <h5 class="mb-0">Resolución CES</h5>
                                    <p class="mb-0">RPC-SO-11-No.185-2024</p>
                                    
                                    <a href="assets/documentos/resoluciones/agricola.pdf" class="btn btn-primary w-100" target="_blank">
                                    
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#competencias">
                                    <i class="bi bi-trophy"></i> Descargar Resolución
                                    </button>
                                    
                                    </a>
                                    
                                </div>
                            </div>
                            <a href="assets/documentos/mallas/malla2.pdf" class="btn btn-success w-100 d-flex align-items-center justify-content-center" target="_blank">
                                <i class="bi bi-download me-2"></i> Descargar Malla Curricular
                            </a>
                        </div>
                    </div>

                    <!-- Statistics Card -->
                    <div class="stats-card agricultural mt-4" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="mb-4">Estadísticas de la Carrera</h4>
                        <div class="stat-item mb-4">
                            <div class="stat-info">
                                <h5 class="mb-3">Puntaje promedio de postulación</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">
                                        <span>180</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stat-item mb-4">
                            <div class="stat-info">
                                <h5 class="mb-3">Número de estudiantes</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">
                                        <span>150</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-info">
                                <h5 class="mb-3">Número de graduados</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">
                                        <span>50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Career Details -->
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="career-description bg-white p-4 rounded-3 shadow-sm">
                        <h2 class="mb-4">Descripción de la Carrera</h2>
                        <p class="lead mb-4">Sé parte de la revolución agrícola y contribuye al desarrollo sostenible del sector.</p>
                        <p class="mb-4">Durante décadas, la mecanización agrícola ha experimentado un crecimiento sostenido y una transformación significativa, convirtiéndose en un pilar fundamental para la modernización y eficiencia del sector agrícola a nivel mundial.</p>
                        <p>En Ecuador, el uso de maquinaria agrícola ha aumentado considerablemente, impulsado por la necesidad de mejorar la productividad y sostenibilidad en el campo. Esto hace evidente la necesidad de contar con profesionales capacitados para satisfacer la demanda, mediante la operación, mantenimiento y optimización de equipos y tecnologías agrícolas avanzadas.</p>
                    </div>

                    <!-- Career Tabs -->
                    <div class="career-tabs mt-4">
                        <ul class="nav nav-pills mb-4" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#competencias">
                                    <i class="bi bi-trophy"></i> Competencias
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#ventajas">
                                    <i class="bi bi-graph-up-arrow"></i> Ventajas
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#instalaciones">
                                    <i class="bi bi-building"></i> Instalaciones
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#laboral">
                                    <i class="bi bi-briefcase"></i> Campo Laboral
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="competencias">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="competency-card agricultural">
                                            <div class="icon">
                                                <i class="bi bi-gear-wide-connected"></i>
                                            </div>
                                            <h4>Operación y Mantenimiento</h4>
                                            <p>Capacidad de operar y mantener maquinaria agrícola en pequeñas y medianas explotaciones agrícolas.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="competency-card agricultural">
                                            <div class="icon">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <h4>Capacitación</h4>
                                            <p>Habilidad para asistir y capacitar a agricultores en el uso adecuado de tecnologías agrícolas.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="competency-card agricultural">
                                            <div class="icon">
                                                <i class="bi bi-calendar4-range"></i>
                                            </div>
                                            <h4>Planificación</h4>
                                            <p>Aptitud para planificar y organizar labores agrícolas, considerando condiciones del suelo y clima.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="competency-card agricultural">
                                            <div class="icon">
                                                <i class="bi bi-graph-up"></i>
                                            </div>
                                            <h4>Innovación</h4>
                                            <p>Capacidad para promover la adopción de tecnologías y maquinaria agrícola moderna.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ventajas">
                                <div class="advantages-list">
                                    <div class="advantage-item agricultural">
                                        <i class="bi bi-gear fs-3 text-success mb-3"></i>
                                        <div>
                                            <h4>Aprendizaje Práctico</h4>
                                            <p class="mb-0">Trabajo en proyectos reales, estudios de casos y visitas a empresas agrícolas.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item agricultural">
                                        <i class="bi bi-laptop fs-3 text-success mb-3"></i>
                                        <div>
                                            <h4>Tecnología Moderna</h4>
                                            <p class="mb-0">Acceso a simuladores agrícolas y herramientas de diagnóstico de maquinaria.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item agricultural">
                                        <i class="bi bi-building fs-3 text-success mb-3"></i>
                                        <div>
                                            <h4>Convenios Empresariales</h4>
                                            <p class="mb-0">Acuerdos con empresas del sector agrícola para prácticas preprofesionales.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item agricultural">
                                        <i class="bi bi-globe fs-3 text-success mb-3"></i>
                                        <div>
                                            <h4>Proyección Internacional</h4>
                                            <p class="mb-0">Oportunidades de intercambio y aprendizaje con instituciones internacionales.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="instalaciones">
                                <div class="facilities-content agricultural">
                                    <div class="facility-image">
                                        <img src="assets/img/info/taller-agricola.jpg" alt="Taller Agrícola" class="img-fluid w-100">
                                    </div>
                                    <div class="facility-description p-4">
                                        <h4 class="mb-4">Infraestructura Especializada</h4>
                                        <p class="mb-4">Contamos con instalaciones modernas y equipadas:</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Taller de maquinaria agrícola
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Laboratorio de simulación
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Campo de prácticas
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Aulas multimedia
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Centro de documentación técnica
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="laboral">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="job-category agricultural">
                                            <h4 class="d-flex align-items-center mb-4">
                                                <i class="bi bi-gear-fill me-2"></i>
                                                Operación
                                            </h4>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-success"></i>
                                                    Operador de Maquinaria
                                                </li>
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-success"></i>
                                                    Supervisor de Campo
                                                </li>
                                                <li>
                                                    <i class="bi bi-arrow-right-circle me-2 text-success"></i>
                                                    Técnico en Mantenimiento
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-category agricultural">
                                            <h4 class="d-flex align-items-center mb-4">
                                                <i class="bi bi-building me-2"></i>
                                                Empresas
                                            </h4>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-success"></i>
                                                    Asesor Técnico
                                                </li>
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-success"></i>
                                                    Gestor de Proyectos
                                                </li>
                                                <li>
                                                    <i class="bi bi-arrow-right-circle me-2 text-success"></i>
                                                    Consultor Agrícola
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
