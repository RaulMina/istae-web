@extends('layouts.app')

@section('title', 'Historia | ISTAE')

@section('content')
@php
    $galleryGroups = [
        [
            'id' => 'actividades-academicas',
            'title' => 'Actividades académicas',
            'description' => 'Evidencias de formación práctica, trabajo colaborativo y participación estudiantil.',
            'route' => url('/history/galeria'),
            'images' => [
                'actividades-academicas-01.webp',
                'actividades-academicas-02.webp',
                'actividades-academicas-03.webp',
                'actividades-academicas-04.webp',
                'actividades-academicas-05.webp',
                'actividades-academicas-06.webp',
                'actividades-academicas-07.webp',
            ],
        ],
        [
            'id' => 'instalaciones',
            'title' => 'Instalaciones',
            'description' => 'Espacios institucionales que acompañan el desarrollo académico y técnico.',
            'route' => url('/history/instalaciones'),
            'images' => [
                'instalaciones-01.webp',
                'instalaciones-02.webp',
            ],
        ],
        [
            'id' => 'reconocimientos-estudiantiles',
            'title' => 'Reconocimientos estudiantiles',
            'description' => 'Momentos que reflejan el esfuerzo, la participación y los logros de la comunidad estudiantil.',
            'route' => url('/history/reconocimientos'),
            'images' => [
                'reconocimientos-estudiantiles-01.webp',
                'reconocimientos-estudiantiles-02.webp',
                'reconocimientos-estudiantiles-03.webp',
                'reconocimientos-estudiantiles-04.webp',
                'reconocimientos-estudiantiles-05.webp',
                'reconocimientos-estudiantiles-06.webp',
                'reconocimientos-estudiantiles-07.webp',
                'reconocimientos-estudiantiles-08.webp',
                'reconocimientos-estudiantiles-09.webp',
                'reconocimientos-estudiantiles-10.webp',
            ],
        ],
    ];

    $historyVideos = [
        [
            'title' => 'Memoria institucional',
            'src' => 'assets/videos/historia/video-historia-01.mp4',
            'poster' => 'assets/img/historia/video-historia-01-poster.jpg',
        ],
        [
            'title' => 'Comunidad ISTAE',
            'src' => 'assets/videos/historia/video-historia-02.mp4',
            'poster' => 'assets/img/historia/video-historia-02-poster.jpg',
        ],
        [
            'title' => 'Experiencias académicas',
            'src' => 'assets/videos/historia/video-historia-03.mp4',
            'poster' => 'assets/img/historia/video-historia-03-poster.jpg',
        ],
    ];
@endphp

<main class="main history-page">
    <section class="history-hero">
        <div class="history-hero-bg" style="background-image: url('{{ asset('assets/img/historia/instalaciones-02.webp') }}');"></div>
        <div class="container">
            <div class="history-hero-content" data-aos="fade-up">
                <span class="history-eyebrow">Memoria institucional</span>
                <h1>Nuestra Historia</h1>
                <p>Forjamos futuro con la mente, las manos, la tecnología y la naturaleza.</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house"></i> Inicio</a></li>
                        <li class="breadcrumb-item active">Historia</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="history-route-section">
        <div class="container">
            <div class="history-route-grid" data-aos="fade-up">
                <a href="{{ url('/history/galeria') }}" class="history-route-card">
                    <i class="bi bi-images"></i>
                    <span>Galería histórica</span>
                </a>
                <a href="{{ url('/history/videos') }}" class="history-route-card">
                    <i class="bi bi-play-btn"></i>
                    <span>Videos institucionales</span>
                </a>
                <a href="{{ url('/history/instalaciones') }}" class="history-route-card">
                    <i class="bi bi-building"></i>
                    <span>Instalaciones</span>
                </a>
                <a href="{{ url('/history/reconocimientos') }}" class="history-route-card">
                    <i class="bi bi-award"></i>
                    <span>Reconocimientos</span>
                </a>
            </div>
        </div>
    </section>

    <section class="history-content">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="history-image-wrapper">
                        <img src="{{ asset('assets/img/historia/historia-portada.webp') }}" alt="Collage institucional del ISTAE" class="img-fluid">
                    </div>

                    <div class="institution-card">
                        <div class="institution-card-header">
                            <i class="bi bi-building"></i>
                            <h2>Instituto Superior Tecnológico Alberto Enríquez</h2>
                        </div>
                        <div class="institution-card-body">
                            <ul class="institution-info">
                                <li><i class="bi bi-bookmark-star"></i><span><strong>Siglas:</strong> ISTAE</span></li>
                                <li><i class="bi bi-bank"></i><span><strong>Tipo:</strong> Pública</span></li>
                                <li><i class="bi bi-quote"></i><span><strong>Lema:</strong> Educación de calidad</span></li>
                                <li><i class="bi bi-calendar-event"></i><span><strong>Fundación:</strong> 20 de julio de 2020</span></li>
                                <li><i class="bi bi-geo-alt"></i><span><strong>Dirección:</strong> Barrio Kennedy</span></li>
                                <li><i class="bi bi-people"></i><span><strong>Estudiantes:</strong> 300</span></li>
                                <li><i class="bi bi-person-badge"></i><span><strong>Rector:</strong> Msc. Alejandro Palacios</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="history-timeline" id="linea-tiempo">
                        <h2 class="timeline-title">
                            <i class="bi bi-journal-text"></i>
                            Acontecimientos históricos
                        </h2>

                        <div class="timeline-items">
                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <span class="timeline-year">2020</span>
                                    <h3>Fundación institucional</h3>
                                    <p>El Instituto Superior Tecnológico Alberto Enríquez inicia su historia institucional el 20 de julio de 2020, con el compromiso de impulsar la formación tecnológica pública y de calidad en el cantón San Lorenzo.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <span class="timeline-year">2022</span>
                                    <h3>Licencia de funcionamiento</h3>
                                    <p>La institución fortalece su reconocimiento como entidad de educación superior pública mediante los registros y acuerdos conferidos por los organismos competentes, orientando su labor a la formación de profesionales de nivel tecnológico.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <span class="timeline-year">2023</span>
                                    <h3>Nombramiento de autoridad institucional</h3>
                                    <p>La Secretaría de Educación Superior, Ciencia, Tecnología e Innovación otorgó el nombramiento al Mgtr. Ever Alejandro Palacios Acosta como Rector del Instituto Superior Tecnológico Alberto Enríquez.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <span class="timeline-year">Actualidad</span>
                                    <h3>Identidad, tecnología y territorio</h3>
                                    <p>El ISTAE consolida su identidad a través de actividades académicas, prácticas técnicas, vinculación con la comunidad, reconocimientos estudiantiles y espacios de aprendizaje conectados con las necesidades del territorio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="history-gallery" id="galeria-historica">
        <div class="container">
            <div class="section-heading" data-aos="fade-up">
                <span>Archivo visual</span>
                <h2>Galería histórica del ISTAE</h2>
                <p>Contenido multimedia organizado para fortalecer la identidad histórica e institucional del instituto.</p>
            </div>

            @foreach($galleryGroups as $group)
                <div class="gallery-group" id="{{ $group['id'] }}" data-aos="fade-up">
                    <div class="gallery-group-header">
                        <div>
                            <h3>{{ $group['title'] }}</h3>
                            <p>{{ $group['description'] }}</p>
                        </div>
                        <a href="{{ $group['route'] }}" class="gallery-route-link">
                            Abrir ruta <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="gallery-grid">
                        @foreach($group['images'] as $index => $image)
                            <a href="{{ asset('assets/img/historia/' . $image) }}" class="gallery-card" target="_blank" rel="noopener">
                                <img src="{{ asset('assets/img/historia/' . $image) }}" alt="{{ $group['title'] }} {{ $index + 1 }}" loading="lazy">
                                <span>{{ $group['title'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="history-videos" id="videos-historia">
        <div class="container">
            <div class="section-heading" data-aos="fade-up">
                <span>Memoria audiovisual</span>
                <h2>Videos institucionales</h2>
                <p>Registro audiovisual de momentos representativos para la comunidad ISTAE.</p>
            </div>

            <div class="row g-4">
                @foreach($historyVideos as $video)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <article class="video-card">
                            <video controls preload="metadata" poster="{{ asset($video['poster']) }}">
                                <source src="{{ asset($video['src']) }}" type="video/mp4">
                                Tu navegador no permite reproducir este video.
                            </video>
                            <div class="video-card-body">
                                <h3>{{ $video['title'] }}</h3>
                                <a href="{{ asset($video['src']) }}" target="_blank" rel="noopener">
                                    Abrir video <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<style>
    .history-page {
        background-color: var(--background-color);
    }

    .history-hero {
        position: relative;
        min-height: 430px;
        display: flex;
        align-items: center;
        overflow: hidden;
        color: var(--contrast-color);
    }

    .history-hero-bg {
        position: absolute;
        /* MODIFICADO: Márgenes negativos para ocultar el borde difuminado */
        top: -20px;
        left: -20px;
        right: -20px;
        bottom: -20px;
        background-size: cover;
        background-position: center;
        filter: blur(8px); /* NUEVO: Aplica el desenfoque al fondo */
        z-index: 1; /* NUEVO */
    }

    .history-hero-bg::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(var(--heading-color-rgb), 0.92), rgba(var(--heading-color-rgb), 0.62));
        z-index: 2; /* NUEVO: Asegura que el degradado esté sobre la imagen */
    }

    .history-hero .container {
        position: relative;
        z-index: 3; /* NUEVO: Pone el texto por encima del degradado y el fondo */
    }

    .history-hero-content {
        max-width: 720px;
        margin: 0 auto; /* NUEVO: Centra el contenedor del texto */
        text-align: center; /* NUEVO: Centra el texto */
        display: flex; /* NUEVO */
        flex-direction: column; /* NUEVO */
        align-items: center; /* NUEVO: Centra elementos internos como las migas de pan */
    }

    .history-eyebrow {
        display: inline-flex;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0.45rem 0.85rem;
        border-radius: 999px;
        background-color: rgba(var(--accent-color-rgb), 0.16);
        color: var(--accent-color);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .history-hero-content h1 {
        color: var(--contrast-color);
        font-size: 2.7rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .history-hero-content p {
        max-width: 650px;
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 1.25rem;
    }

    .breadcrumb {
        background: transparent;
        margin-bottom: 0;
        justify-content: center; /* MODIFICADO: Centra las migas de pan */
        padding: 0; /* MODIFICADO: Resetea el padding si Bootstrap lo altera */
    }

    .breadcrumb-item a {
        color: var(--accent-color);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: var(--contrast-color);
    }

    .history-route-section {
        padding: 2rem 0 0;
    }

    .history-route-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1rem;
    }

    .history-route-card {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        min-height: 78px;
        background-color: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 8px;
        color: var(--heading-color);
        text-decoration: none;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .history-route-card:hover {
        transform: translateY(-4px);
        color: var(--heading-color);
        box-shadow: 0 14px 32px rgba(0, 0, 0, 0.1);
    }

    .history-route-card i {
        color: var(--accent-color);
        font-size: 1.5rem;
    }

    .history-route-card span {
        font-weight: 700;
        line-height: 1.25;
    }

    .history-content,
    .history-gallery,
    .history-videos {
        padding: 4rem 0;
    }

    .history-image-wrapper,
    .institution-card,
    .history-timeline,
    .gallery-group,
    .video-card {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .history-image-wrapper {
        margin-bottom: 2rem;
    }

    .history-image-wrapper img {
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: cover;
    }

    .institution-card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: var(--heading-color);
        color: var(--contrast-color);
    }

    .institution-card-header h2 {
        color: var(--contrast-color);
        font-size: 1.15rem;
        font-weight: 700;
        margin: 0;
    }

    .institution-card-header i {
        color: var(--accent-color);
        font-size: 1.5rem;
    }

    .institution-card-body {
        padding: 1.5rem;
    }

    .institution-info {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .institution-info li {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.85rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .institution-info li:last-child {
        border-bottom: none;
    }

    .institution-info i {
        color: var(--accent-color);
        font-size: 1.2rem;
    }

    .history-timeline {
        padding: 2rem;
    }

    .timeline-title {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        color: var(--heading-color);
        font-size: 1.7rem;
        font-weight: 700;
        margin-bottom: 2rem;
        text-align: center;
    }

    .timeline-items {
        position: relative;
        padding-left: 2rem;
    }

    .timeline-items::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.35rem;
        bottom: 0;
        width: 2px;
        background: var(--accent-color);
    }

    .timeline-item {
        position: relative;
        padding-bottom: 2rem;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-marker {
        position: absolute;
        left: -2.38rem;
        top: 0.25rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--accent-color);
        border: 4px solid #ffffff;
        box-shadow: 0 0 0 2px var(--accent-color);
    }

    .timeline-content {
        margin-left: 1rem;
        padding: 1.35rem;
        border-radius: 8px;
        background: rgba(var(--accent-color-rgb), 0.06);
    }

    .timeline-year {
        display: inline-flex;
        margin-bottom: 0.7rem;
        color: var(--accent-color);
        font-weight: 800;
        font-size: 0.85rem;
        text-transform: uppercase;
    }

    .timeline-content h3 {
        color: var(--heading-color);
        font-size: 1.16rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .timeline-content p {
        color: var(--text-color);
        line-height: 1.65;
        text-align: justify;
        margin: 0;
    }

    .history-gallery {
        background-color: #f8f9fa;
    }

    .section-heading {
        max-width: 760px;
        margin: 0 auto 2.5rem;
        text-align: center;
    }

    .section-heading span {
        display: inline-flex;
        margin-bottom: 0.75rem;
        color: var(--accent-color);
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.82rem;
    }

    .section-heading h2 {
        color: var(--heading-color);
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .section-heading p {
        color: var(--text-color);
        line-height: 1.7;
        margin: 0;
    }

    .gallery-group {
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .gallery-group:last-child {
        margin-bottom: 0;
    }

    .gallery-group-header {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .gallery-group-header h3 {
        color: var(--heading-color);
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 0.4rem;
    }

    .gallery-group-header p {
        color: var(--text-color);
        margin: 0;
        line-height: 1.6;
    }

    .gallery-route-link,
    .video-card-body a {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        color: var(--accent-color);
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1rem;
    }

    .gallery-card {
        position: relative;
        display: block;
        overflow: hidden;
        border-radius: 8px;
        background-color: #f3f5f7;
        min-height: 170px;
        text-decoration: none;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        aspect-ratio: 4 / 3;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.06);
    }

    .gallery-card span {
        position: absolute;
        left: 0.75rem;
        right: 0.75rem;
        bottom: 0.75rem;
        padding: 0.45rem 0.6rem;
        border-radius: 8px;
        background-color: rgba(0, 0, 0, 0.58);
        color: #ffffff;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .video-card {
        height: 100%;
    }

    .video-card video {
        display: block;
        width: 100%;
        aspect-ratio: 9 / 16;
        max-height: 520px;
        background-color: #000000;
        object-fit: contain;
    }

    .video-card-body {
        padding: 1.25rem;
    }

    .video-card-body h3 {
        color: var(--heading-color);
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    @media (max-width: 991.98px) {
        .history-route-grid,
        .gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767.98px) {
        .history-hero {
            min-height: 360px;
        }

        .history-hero-content h1 {
            font-size: 2rem;
        }

        .history-content,
        .history-gallery,
        .history-videos {
            padding: 3rem 0;
        }

        .history-route-grid,
        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-group-header {
            flex-direction: column;
        }

        .history-timeline {
            padding: 1.35rem;
        }

        .timeline-items {
            padding-left: 1.5rem;
        }

        .timeline-marker {
            left: -1.9rem;
        }

        .timeline-content {
            margin-left: 0.5rem;
        }
    }
</style>
@endsection