    <!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Desarrollo de Software | ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<main class="main">
    <!-- Hero Section -->
    <section class="career-hero" style="background-image: url('assets/img/info/s3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1>Tecnología Superior en Desarrollo de Software</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#careers">Carreras</a></li>
                        <li class="breadcrumb-item active">Desarrollo de Software</li>
            </ol>
          </nav>
        </div>
                </div>
    </section>

    <!-- Career Overview -->
    <section class="career-overview">
        <div class="container">
            <div class="row g-4">
                <!-- Career Info Card -->
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="info-card">
                        <div class="card-image">
                            <img src="assets/img/info/s3.jpg" alt="Desarrollo de Software" class="img-fluid">
                            <div class="approval-badge">
                                <i class="bi bi-patch-check-fill"></i>
                                <span>Aprobada por el CES</span>
            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <i class="bi bi-calendar-check"></i>
                                <div>
                                    <h5>Duración</h5>
                                    <p>4 Semestres</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-mortarboard"></i>
                                <div>
                                    <h5>Modalidad</h5>
                                    <p>Presencial</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-cash-coin"></i>
                                <div>
                                    <h5>Matrícula</h5>
                                    <p>Gratuita</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-file-earmark-text"></i>
                                <div>
                                    <h5>Resolución CES</h5>
                                    <p>RPC-SO-21-No.353-2024</p>
                                    
                                    <a href="assets/documentos/resoluciones/software.pdf" class="btn btn-primary w-100" target="_blank">
                                    
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#competencias">
                                    <i class="bi bi-trophy"></i> Descargar Resolución
                                    </button>
                                    
                                    </a>
                                    
                                    
                                    
                                    
                                    
                        </div>
                        </div>
                            <a href="assets/documentos/mallas/malla1.pdf" class="btn btn-primary w-100" target="_blank">
                                <i class="bi bi-download"></i> Descargar Malla Curricular
                            </a>
                        </div>
                    </div>

                    <!-- Statistics Card -->
                    <div class="stats-card" data-aos="fade-up" data-aos-delay="100">
                        <h4>Estadísticas de la Carrera</h4>
                        <div class="stat-item">
                            <div class="stat-info">
                                <h5>Puntaje promedio de postulación</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">
                                        <span>100</span>
                    </div>
                </div>
            </div>
        </div>
                        <div class="stat-item">
                            <div class="stat-info">
                                <h5>Número de estudiantes</h5>
                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">
                                        <span>70</span>
                                    </div>
                    </div>
                </div>
            </div>
                        <div class="stat-item">
                            <div class="stat-info">
                                <h5>Número de graduados</h5>
                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 37%;">
                                        <span>37</span>
                                    </div>
                    </div>
                </div>
            </div>
                    </div>
                </div>

                <!-- Career Details -->
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="career-description">
                        <h2>Descripción de la Carrera</h2>
                        <p class="lead">Forma parte de la revolución digital y conviértete en un profesional del desarrollo de software.</p>
                        <p>Durante décadas, el desarrollo de software ha experimentado un crecimiento continuo y una transformación significativa, convirtiéndose en uno de los sectores más dinámicos y cruciales en la economía global. En Ecuador, la demanda de soluciones tecnológicas y software a medida ha aumentado considerablemente, impulsada por la transformación digital en diversas industrias.</p>
                        <p>Esto hace evidente la necesidad de contar con profesionales capacitados para satisfacer las necesidades del mercado mediante el diseño, desarrollo, implementación y mantenimiento de software de alta calidad, que ofrece la Tecnología en Desarrollo de Software.</p>
            </div>

                    <!-- Career Tabs -->
                    <div class="career-tabs">
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
                                <div class="competencies-grid">
                                    <div class="competency-card">
                                        <div class="icon">
                                            <i class="bi bi-code-square"></i>
                                        </div>
                                        <h4>Desarrollo de Software</h4>
                                        <p>Capacidad de diseñar, desarrollar y mantener aplicaciones de software para pequeñas y medianas empresas, adaptándose a las necesidades específicas del cliente.</p>
                                    </div>
                                    <div class="competency-card">
                                        <div class="icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <h4>Trabajo en Equipo</h4>
                                        <p>Habilidad para colaborar en equipos de desarrollo, aplicando metodologías ágiles y técnicas de gestión de proyectos para asegurar la entrega eficiente de software.</p>
                                    </div>
                                    <div class="competency-card">
                                        <div class="icon">
                                            <i class="bi bi-gear"></i>
                                        </div>
                                        <h4>Análisis y Planificación</h4>
                                        <p>Aptitud para analizar, planificar y optimizar sistemas de software, considerando las condiciones tecnológicas, los requisitos del usuario y las mejores prácticas de la industria.</p>
                                    </div>
                                    <div class="competency-card">
                                        <div class="icon">
                                            <i class="bi bi-graph-up"></i>
                                        </div>
                                        <h4>Marketing Digital</h4>
                                        <p>Capacidad para implementar y gestionar estrategias de marketing digital, utilizando herramientas de software para promover productos y servicios en línea.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ventajas">
                                <div class="advantages-list">
                                    <div class="advantage-item">
                                        <i class="bi bi-laptop"></i>
                                        <div>
                                            <h4>Aprendizaje Práctico</h4>
                                            <p>Trabajo en proyectos reales, estudios de casos, desarrollo de aplicaciones, y participación en hackatones y talleres de programación.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item">
                                        <i class="bi bi-diagram-3"></i>
                                        <div>
                                            <h4>Metodologías Múltiples</h4>
                                            <p>Uso de diversas metodologías de enseñanza-aprendizaje, tecnologías de la información y clases interactivas.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item">
                                        <i class="bi bi-building"></i>
                                        <div>
                                            <h4>Convenios Empresariales</h4>
                                            <p>Acuerdos con empresas de tecnología para facilitar prácticas preprofesionales y experiencia laboral.</p>
                                        </div>
                                    </div>
                                    <div class="advantage-item">
                                        <i class="bi bi-translate"></i>
                                        <div>
                                            <h4>Inglés Técnico</h4>
                                            <p>Aprendizaje del idioma inglés enfocado en desarrollo de software y colaboración internacional.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="instalaciones">
                                <div class="facilities-content">
                                    <div class="facility-image">
                                        <img src="assets/img/info/lab-software.jpg" alt="Laboratorio de Software" class="img-fluid">
                                    </div>
                                    <div class="facility-description">
                                        <h4>Infraestructura Moderna</h4>
                                        <p>La carrera se desarrolla en instalaciones modernas y bien equipadas:</p>
                                        <ul>
                                            <li><i class="bi bi-check-circle"></i> Laboratorios de computación con software especializado</li>
                                            <li><i class="bi bi-check-circle"></i> Aulas con equipamiento multimedia</li>
                                            <li><i class="bi bi-check-circle"></i> Espacios de trabajo colaborativo</li>
                                            <li><i class="bi bi-check-circle"></i> Biblioteca con recursos digitales</li>
                                            <li><i class="bi bi-check-circle"></i> Salas de reuniones para proyectos</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="laboral">
                                <div class="job-opportunities">
                                    <div class="job-category">
                                        <h4><i class="bi bi-code-slash"></i> Desarrollo de Software</h4>
                                        <ul>
                                            <li>Desarrollador Full Stack</li>
                                            <li>Programador Frontend/Backend</li>
                                            <li>Desarrollador de Aplicaciones Móviles</li>
                                        </ul>
                                    </div>
                                    <div class="job-category">
                                        <h4><i class="bi bi-database"></i> Gestión de Datos</h4>
                                        <ul>
                                            <li>Administrador de Bases de Datos</li>
                                            <li>Analista de Datos</li>
                                            <li>Especialista en Business Intelligence</li>
                                        </ul>
                                    </div>
                                    <div class="job-category">
                                        <h4><i class="bi bi-gear-wide"></i> Gestión de Proyectos</h4>
                                        <ul>
                                            <li>Líder de Proyecto Técnico</li>
                                            <li>Scrum Master</li>
                                            <li>Analista de Sistemas</li>
                                        </ul>
                                    </div>
                                    <div class="job-category">
                                        <h4><i class="bi bi-shop"></i> Emprendimiento</h4>
                                        <ul>
                                            <li>Consultor Tecnológico</li>
                                            <li>Emprendedor Digital</li>
                                            <li>Freelancer en Desarrollo</li>
                                        </ul>
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

<style>
/* Hero Section */
.career-hero {
    position: relative;
    height: 60vh;
    min-height: 400px;
    background-size: cover;
    background-position: center;
    color: white;
    display: flex;
    align-items: center;
    margin-top: -2rem;
}

.career-hero .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));
}

.career-hero .hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
}

.career-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.career-hero .breadcrumb {
    justify-content: center;
    background: transparent;
}

.career-hero .breadcrumb-item a {
    color: var(--accent-color);
    text-decoration: none;
}

.career-hero .breadcrumb-item.active {
    color: white;
}

/* Career Overview Section */
.career-overview {
    padding: 6rem 0;
    background-color: var(--background-color);
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.info-card .card-image {
    position: relative;
    height: 200px;
}

.info-card .card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.info-card .approval-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--accent-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

.info-card .card-body {
    padding: 2rem;
}

.info-card .info-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.info-card .info-item i {
    font-size: 1.5rem;
    color: var(--accent-color);
}

.info-card .info-item h5 {
    margin: 0;
    font-size: 1rem;
    color: var(--heading-color);
}

.info-card .info-item p {
    margin: 0;
    color: var(--text-color);
}

/* Statistics Card */
.stats-card {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
}

.stats-card h4 {
    color: var(--heading-color);
    margin-bottom: 2rem;
    text-align: center;
}

.stat-item {
    margin-bottom: 1.5rem;
}

.stat-item h5 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: var(--text-color);
}

.stat-item .progress {
    height: 10px;
    border-radius: 5px;
    background: rgba(var(--accent-color-rgb), 0.1);
}

.stat-item .progress-bar {
    background: var(--accent-color);
    border-radius: 5px;
    position: relative;
}

.stat-item .progress-bar span {
    position: absolute;
    right: 0;
    top: -25px;
    font-weight: 600;
}

/* Career Description */
.career-description {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
}

.career-description h2 {
    color: var(--heading-color);
    margin-bottom: 1rem;
}

.career-description .lead {
    color: var(--accent-color);
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
}

/* Career Tabs */
.career-tabs {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 0 30px rgba(0,0,0,0.1);
}

.nav-pills {
    gap: 1rem;
    margin-bottom: 2rem;
}

.nav-pills .nav-link {
    background: rgba(var(--accent-color-rgb), 0.1);
    color: var(--heading-color);
    border-radius: 5px;
    padding: 0.8rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.nav-pills .nav-link.active {
    background: var(--accent-color);
    color: white;
}

/* Competencies Grid */
.competencies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.competency-card {
    background: rgba(var(--accent-color-rgb), 0.05);
    padding: 2rem;
    border-radius: 10px;
    text-align: center;
}

.competency-card .icon {
    width: 60px;
    height: 60px;
    background: var(--accent-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.5rem;
}

.competency-card h4 {
    color: var(--heading-color);
    margin-bottom: 1rem;
}

/* Advantages List */
.advantages-list {
    display: grid;
    gap: 2rem;
}

.advantage-item {
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
}

.advantage-item i {
    font-size: 2rem;
    color: var(--accent-color);
}

.advantage-item h4 {
    color: var(--heading-color);
    margin-bottom: 0.5rem;
}

/* Facilities Content */
.facilities-content {
    display: grid;
    gap: 2rem;
}

.facility-image {
    border-radius: 10px;
    overflow: hidden;
}

.facility-description ul {
    list-style: none;
    padding: 0;
    margin: 1rem 0 0;
}

.facility-description li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
}

.facility-description i {
    color: var(--accent-color);
}

/* Job Opportunities */
.job-opportunities {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
}

.job-category h4 {
    color: var(--heading-color);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.job-category ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.job-category li {
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.job-category li:last-child {
    border-bottom: none;
}

/* Responsive Design */
@media (max-width: 991px) {
    .career-hero {
        height: 50vh;
    }

    .career-hero h1 {
        font-size: 2.5rem;
    }

    .competencies-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}

@media (max-width: 768px) {
    .career-hero {
        height: 40vh;
    }

    .career-hero h1 {
        font-size: 2rem;
    }

    .nav-pills {
        flex-wrap: wrap;
    }

    .nav-pills .nav-link {
        width: 100%;
    }

    .advantage-item {
        flex-direction: column;
        text-align: center;
    }

    .job-opportunities {
        grid-template-columns: 1fr;
    }
}
</style>

@endsection
