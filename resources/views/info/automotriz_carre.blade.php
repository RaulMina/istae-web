    <!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Mecánica Automotriz | ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<style>
    /* Estilos únicos para Mecánica Automotriz */
    .career-hero.automotive {
        background-attachment: fixed;
        position: relative;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 60vh;
        display: flex;
        align-items: center;
    }

    .career-hero.automotive .overlay {
        background: linear-gradient(45deg, rgba(0,0,0,0.85) 0%, rgba(44,62,80,0.85) 100%);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .career-hero.automotive .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .career-hero.automotive .hero-content h1 {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .career-hero.automotive .breadcrumb {
        background: rgba(255,255,255,0.1);
        padding: 0.75rem 1rem;
        border-radius: 50px;
        display: inline-flex;
        margin: 0;
    }

    .career-hero.automotive .breadcrumb-item,
    .career-hero.automotive .breadcrumb-item a {
        color: white;
        font-weight: 500;
    }

    .career-hero.automotive .breadcrumb-item.active {
        color: rgba(255,255,255,0.8);
    }

    .career-hero.automotive .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,0.8);
    }

    .info-card.automotive {
        border: none;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .info-card.automotive:hover {
        transform: translateY(-5px);
    }

    .stats-card.automotive {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
    }

    .stats-card.automotive .progress {
        height: 8px;
        background-color: rgba(255,255,255,0.2);
    }

    .stats-card.automotive .progress-bar {
        background-color: #e74c3c;
    }

    .competency-card.automotive {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .competency-card.automotive:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .competency-card.automotive .icon {
        background: linear-gradient(45deg, #e74c3c 0%, #c0392b 100%);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .advantage-item.automotive {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid #e74c3c;
        transition: all 0.3s ease;
    }

    .advantage-item.automotive:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .facilities-content.automotive {
        background: #f8f9fa;
        border-radius: 15px;
        overflow: hidden;
    }

    .job-category.automotive {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-top: 4px solid #e74c3c;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
</style>

<main class="main">
    <!-- Hero Section -->
    <section class="career-hero automotive" style="background-image: url('assets/img/info/s1.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1 class="display-4 fw-bold">Tecnología Superior en Mecánica Automotriz</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#careers">Carreras</a></li>
                        <li class="breadcrumb-item active">Mecánica Automotriz</li>
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
                    <div class="info-card automotive">
                        <div class="card-image position-relative">
                            <img src="assets/img/info/s1.jpg" alt="Mecánica Automotriz" class="img-fluid">
                            <div class="approval-badge">
                                <i class="bi bi-patch-check-fill"></i>
                                <span>Aprobada por el CES</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-item d-flex align-items-center mb-3">
                                <i class="bi bi-calendar-check fs-4 me-3 text-primary"></i>
                                <div>
                                    <h5 class="mb-0">Duración</h5>
                                    <p class="mb-0">4 Semestres</p>
                                </div>
                            </div>
                            <div class="info-item d-flex align-items-center mb-3">
                                <i class="bi bi-mortarboard fs-4 me-3 text-primary"></i>
                                <div>
                                    <h5 class="mb-0">Modalidad</h5>
                                    <p class="mb-0">Presencial</p>
                                </div>
                            </div>
                            <div class="info-item d-flex align-items-center mb-3">
                                <i class="bi bi-cash-coin fs-4 me-3 text-primary"></i>
                                <div>
                                    <h5 class="mb-0">Matrícula</h5>
                                    <p class="mb-0">Gratuita</p>
                                </div>
                            </div>
                            <div class="info-item d-flex align-items-center mb-4">
                                <i class="bi bi-file-earmark-text fs-4 me-3 text-primary"></i>
                                <div>
                                    <h5 class="mb-0">Resolución CES</h5>
                                    <p class="mb-0">RPC-SO-17-No.302-2024</p>
                                    
                                    <a href="assets/documentos/resoluciones/automotriz.pdf" class="btn btn-primary w-100" target="_blank">
                                    
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#competencias">
                                    <i class="bi bi-trophy"></i> Descargar Resolución
                                    </button>
                                    
                                    </a>
                                    
                                </div>
                            </div>
                            <a href="assets/documentos/mallas/malla3.pdf" class="btn btn-primary w-100 d-flex align-items-center justify-content-center" target="_blank">
                                <i class="bi bi-download me-2"></i> Descargar Malla Curricular
                            </a>
                        </div>
                    </div>

                    <!-- Statistics Card -->
                    <div class="stats-card automotive mt-4" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="mb-4">Estadísticas de la Carrera</h4>
                        <div class="stat-item mb-4">
                            <div class="stat-info">
                                <h5 class="mb-3">Puntaje promedio de postulación</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%;">
                                        <span>70</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stat-item mb-4">
                            <div class="stat-info">
                                <h5 class="mb-3">Número de estudiantes</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%;">
                                        <span>40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-info">
                                <h5 class="mb-3">Número de graduados</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 35%;">
                                        <span>30</span>
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
                        <p class="lead mb-4">Conviértete en un experto en tecnología automotriz y sé parte de la evolución del transporte.</p>
                        <p class="mb-4">Durante décadas, la industria automotriz ha experimentado un crecimiento constante y una transformación significativa, convirtiéndose en uno de los sectores más dinámicos en la economía global. En Ecuador, el parque automotor ha crecido considerablemente en los últimos años, lo que resalta la necesidad de contar con profesionales capacitados para satisfacer las demandas del sector.</p>
                        <p>La carrera de Tecnología en Mecánica Automotriz forma profesionales especializados en el mantenimiento, reparación, y optimización de vehículos, asegurando su funcionamiento eficiente y seguro. Esta formación incluye conocimientos en sistemas de diagnóstico, gestión de talleres, y tecnologías emergentes en la industria automotriz.</p>
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
                                        <div class="competency-card automotive">
                                            <div class="icon">
                                                <i class="bi bi-tools"></i>
                                            </div>
                                            <h4>Gestión de Talleres</h4>
                                            <p>Capacidad de administrar y operar talleres mecánicos en pequeñas y medianas empresas del sector automotriz.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="competency-card automotive">
                                            <div class="icon">
                                                <i class="bi bi-car-front"></i>
                                            </div>
                                            <h4>Diagnóstico y Reparación</h4>
                                            <p>Habilidad para diagnosticar, reparar y mantener vehículos automotores, asegurando un rendimiento óptimo y la seguridad del cliente.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="competency-card automotive">
                                            <div class="icon">
                                                <i class="bi bi-clipboard-data"></i>
                                            </div>
                                            <h4>Planificación</h4>
                                            <p>Aptitud para organizar y planificar el mantenimiento preventivo y correctivo de flotas de vehículos.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="competency-card automotive">
                                            <div class="icon">
                                                <i class="bi bi-megaphone"></i>
                                            </div>
                                            <h4>Marketing de Servicios</h4>
                                            <p>Capacidad de promover la venta de servicios automotrices y repuestos a través de estrategias de marketing.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ventajas">
                                <div class="advantages-list">
                                    <div class="advantage-item automotive">
                                        <i class="bi bi-wrench fs-3 text-primary mb-3"></i>
                                        <div>
                                            <h4>Aprendizaje Práctico</h4>
                                            <p class="mb-0">Trabajo en proyectos reales, estudios de casos, visitas a talleres y empresas automotrices.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item automotive">
                                        <i class="bi bi-laptop fs-3 text-primary mb-3"></i>
                                        <div>
                                            <h4>Tecnología Moderna</h4>
                                            <p class="mb-0">Acceso a simuladores de diagnóstico automotriz y equipamiento de última generación.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item automotive">
                                        <i class="bi bi-building fs-3 text-primary mb-3"></i>
                                        <div>
                                            <h4>Convenios Empresariales</h4>
                                            <p class="mb-0">Acuerdos con empresas del sector automotriz para prácticas preprofesionales.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item automotive">
                                        <i class="bi bi-translate fs-3 text-primary mb-3"></i>
                                        <div>
                                            <h4>Inglés Técnico</h4>
                                            <p class="mb-0">Aprendizaje del inglés técnico automotriz para manejo de manuales y documentación.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="instalaciones">
                                <div class="facilities-content automotive">
                                    <div class="facility-image">
                                        <img src="assets/img/info/taller-auto.jpg" alt="Taller Automotriz" class="img-fluid w-100">
                                    </div>
                                    <div class="facility-description p-4">
                                        <h4 class="mb-4">Infraestructura Especializada</h4>
                                        <p class="mb-4">Nuestras instalaciones están equipadas con tecnología de punta:</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Taller de mecánica completamente equipado
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Laboratorio de diagnóstico automotriz
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Área de simulación técnica
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled">
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Aulas con equipamiento multimedia
                                                    </li>
                                                    <li class="mb-3">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        Biblioteca técnica especializada
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
                                        <div class="job-category automotive">
                                            <h4 class="d-flex align-items-center mb-4">
                                                <i class="bi bi-wrench-adjustable me-2"></i>
                                                Talleres Mecánicos
                                            </h4>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-primary"></i>
                                                    Técnico Automotriz
                                                </li>
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-primary"></i>
                                                    Jefe de Taller
                                                </li>
                                                <li>
                                                    <i class="bi bi-arrow-right-circle me-2 text-primary"></i>
                                                    Especialista en Diagnóstico
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="job-category automotive">
                                            <h4 class="d-flex align-items-center mb-4">
                                                <i class="bi bi-building me-2"></i>
                                                Concesionarios
                                            </h4>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-primary"></i>
                                                    Asesor de Servicio
                                                </li>
                                                <li class="mb-3">
                                                    <i class="bi bi-arrow-right-circle me-2 text-primary"></i>
                                                    Técnico Especializado
                                                </li>
                                                <li>
                                                    <i class="bi bi-arrow-right-circle me-2 text-primary"></i>
                                                    Supervisor de Mantenimiento
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
