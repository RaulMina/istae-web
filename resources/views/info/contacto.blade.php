<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Contacto | ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1><i class="bi bi-envelope-paper"></i> Contacto</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bi bi-house"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Contacto</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Alerts Section -->
    <div class="container alerts-container">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="warning-alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Contact Section -->
    <section class="contact-content">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
                <h2><i class="bi bi-chat-dots"></i> ¿Necesitas ayuda?</h2>
                <p>Estamos aquí para responder tus preguntas</p>
            </div>

            <div class="row g-4">
                <!-- Contact Information -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info">
                        <div class="info-card">
                            <div class="info-item">
                                <div class="icon-wrapper">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h3>Dirección</h3>
                                    <p>AV. Carchi, Instalaciones de la Unidad educativa Fiscomisional San Lorenzo</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="icon-wrapper">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="info-content">
                                    <h3>Teléfono</h3>
                                    <p>0996566160</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="icon-wrapper">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <h3>Email</h3>
                                    <p>secretariageneralistae@gmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.823696979017!2d-78.84257772591602!3d1.2793795987084566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2c9bd7cdb62ce5%3A0xf09aec9a8a5254fb!2sUNIDAD%20EDUCATIVA%20SAN%20LORENZO!5e0!3m2!1ses!2sec!4v1721538113244!5m2!1ses!2sec" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form-container">
                        <form action="{{route('istaepost')}}" method="post" enctype="multipart/form-data" class="contact-form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            <i class="bi bi-person"></i>
                                            Nombres y Apellidos
                                        </label>
                                        <input type="text" id="name" name="nombre" class="form-control" placeholder="Escribe tu nombre completo" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="bi bi-envelope"></i>
                                            Correo electrónico
                                        </label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Escribe tu correo electrónico" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">
                                            <i class="bi bi-chat-text"></i>
                                            Mensaje
                                        </label>
                                        <textarea id="message" name="smsg" class="form-control" rows="6" placeholder="Escribe tu mensaje aquí" required></textarea>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-send"></i>
                                        Enviar Mensaje
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.contact-page {
    background-color: var(--background-color);
}

/* Hero Section */
.contact-hero {
    background: linear-gradient(rgba(var(--heading-color-rgb), 0.9), rgba(var(--heading-color-rgb), 0.9)), url('assets/img/portfolio/istae.jpeg');
    background-size: cover;
    background-position: center;
    padding: 80px 0;
    margin-bottom: 3rem;
    color: var(--contrast-color);
}

.hero-content {
    text-align: center;
}

.hero-content h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.breadcrumb {
    justify-content: center;
    background: transparent;
}

.breadcrumb-item a {
    color: var(--accent-color);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: var(--contrast-color);
}

/* Alerts */
.alerts-container {
    margin-bottom: 2rem;
}

.alert {
    border: none;
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
}

.alert i {
    font-size: 1.2rem;
}

/* Section Title */
.section-title {
    margin-bottom: 3rem;
}

.section-title h2 {
    color: var(--heading-color);
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.section-title p {
    color: var(--text-color);
    font-size: 1.1rem;
}

/* Contact Information */
.contact-info {
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.info-card {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.info-item:last-child {
    border-bottom: none;
}

.icon-wrapper {
    width: 50px;
    height: 50px;
    background: var(--accent-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.icon-wrapper i {
    font-size: 1.5rem;
    color: white;
}

.info-content h3 {
    color: var(--heading-color);
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.info-content p {
    color: var(--text-color);
    margin: 0;
    line-height: 1.6;
}

/* Map */
.map-container {
    background: white;
    border-radius: 10px;
    padding: 1rem;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    height: 300px;
}

.map-container iframe {
    width: 100%;
    height: 100%;
    border-radius: 5px;
}

/* Contact Form */
.contact-form-container {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    color: var(--heading-color);
    font-weight: 500;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-group label i {
    color: var(--accent-color);
}

.form-control {
    border: 1px solid rgba(0,0,0,0.1);
    border-radius: 5px;
    padding: 0.8rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 0.2rem rgba(var(--accent-color-rgb), 0.25);
}

textarea.form-control {
    resize: vertical;
}

.btn-primary {
    background: var(--accent-color);
    border: none;
    padding: 0.8rem 2rem;
    border-radius: 5px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: var(--heading-color);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .contact-hero {
        padding: 40px 0;
    }

    .hero-content h1 {
        font-size: 2rem;
    }

    .contact-form-container {
        margin-top: 2rem;
    }
}
</style>

<script>
// Función para ocultar las alertas después de 5 segundos
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
</script>

@endsection
