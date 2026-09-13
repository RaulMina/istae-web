@extends('layouts.app')

@section('title', 'ISTAE | Investigación')

@section('content')

@if (($matriz['tipo_trabajo'] ?? '') === 'Proyectos')

    @php
        $revistasLuminis = [
            [
                'nombre' => 'Journal of Digital Health & Human-Centered AI',
                'sigla' => 'JDHAI',
                'area' => 'Salud digital e inteligencia artificial centrada en el ser humano',
                'issn' => null,
                'logo' => 'assets/img/revistas/jdhai.png',
                'url' => 'https://jdhai.luminiseditorial.com/index.php/jdhai/index',
            ],
            [
                'nombre' => 'STEPS',
                'sigla' => 'STEPS',
                'area' => 'Sostenibilidad, transición energética y desarrollo sostenible',
                'issn' => null,
                'logo' => 'assets/img/revistas/steps.png',
                'url' => 'https://steps.luminiseditorial.com/index.php/steps',
            ],
            [
                'nombre' => 'Leadership and Social Work',
                'sigla' => 'LSW',
                'area' => 'Liderazgo, intervención social y trabajo social',
                'issn' => '3121-2670',
                'logo' => 'assets/img/revistas/lsw.png',
                'url' => 'https://lsw.luminiseditorial.com/index.php/lsw',
            ],
            [
                'nombre' => 'Applied Planetary Health',
                'sigla' => 'APH',
                'area' => 'Salud planetaria, ambiente y bienestar humano',
                'issn' => null,
                'logo' => 'assets/img/revistas/aph.png',
                'url' => 'https://aph.luminiseditorial.com/index.php/aph',
            ],
            [
                'nombre' => 'Global Digital Culture & Communication',
                'sigla' => 'GDCC',
                'area' => 'Cultura digital, medios y comunicación global',
                'issn' => null,
                'logo' => 'assets/img/revistas/gdcc.png',
                'url' => 'https://gdcc.luminiseditorial.com/index.php/gdcc',
            ],
            [
                'nombre' => 'Post-Digital Education & Social Inclusion',
                'sigla' => 'PDESI',
                'area' => 'Educación posdigital, innovación e inclusión social',
                'issn' => null,
                'logo' => 'assets/img/revistas/pdesi.png',
                'url' => 'https://pdesi.luminiseditorial.com/index.php/pdesi',
            ],
            [
                'nombre' => 'Development, Health & Psychology Journal',
                'sigla' => 'DHP',
                'area' => 'Desarrollo humano, salud y psicología',
                'issn' => null,
                'logo' => 'assets/img/revistas/dhp.png',
                'url' => 'https://dhp.luminiseditorial.com/index.php/dhp',
            ],
        ];

    @endphp

    <main class="research-page">
        <!-- Encabezado de la página -->
        <section class="research-hero">
            <div class="container text-center" data-aos="fade-up">
                <span class="research-kicker">Investigación ISTAE</span>
                <h1>Revistas científicas y editoriales aliadas</h1>
                <p>
                    Fortalecemos la producción, difusión y visibilidad de la investigación
                    mediante alianzas editoriales y científicas que conectan a nuestra
                    comunidad académica con espacios especializados de publicación.
                </p>
            </div>
        </section>

        <!-- Identificación de coedición -->
        <section class="coedition-section">
            <div class="container">
                <div class="coedition-box" data-aos="fade-up">
                    <div class="coedition-icon" aria-hidden="true">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div>
                        <span>Identificación de coedición</span>
                        <p>
                            <strong>Entidades coeditoras:</strong> Instituto Superior Tecnológico
                            Alberto Enríquez – ISTAE y Luminis Editorial
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Presentación de los aliados editoriales y científicos -->
        <section class="publisher-section">
            <div class="container">
                <!-- REINCISOL -->
                <div class="publisher-card" data-aos="fade-up">
                    <div class="publisher-logo">
                        <img src="{{ asset('assets/img/aliados/reincisol.png') }}"
                             alt="Logotipo de REINCISOL">
                    </div>

                    <div class="publisher-content">
                        <span class="content-label">Revista científica aliada</span>
                        <h2>REINCISOL</h2>
                        <p>
                            Revista de Investigación Científica y Social orientada a la difusión
                            de estudios académicos y aportes multidisciplinarios que contribuyen
                            al desarrollo científico y social.
                        </p>

                        <div class="publisher-meta">
                            <span><i class="bi bi-upc-scan"></i> <strong>ISSN:</strong> 2953-6421</span>
                            <span><i class="bi bi-bookmark-check"></i> Investigación científica y social</span>
                        </div>

                        <div class="publisher-actions">
                            <a href="https://www.reincisol.com/ojs/index.php/reincisol/index"
                               class="institutional-btn"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-journal-text"></i> Visitar revista
                            </a>

                            <a href="mailto:envios@reincisol.com"
                               class="institutional-btn institutional-btn-outline">
                                <i class="bi bi-envelope"></i> envios@reincisol.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Revista Social Fronteriza -->
                <div class="publisher-card" data-aos="fade-up">
                    <div class="publisher-logo">
                        <img src="{{ asset('assets/img/aliados/social.png') }}"
                             alt="Logotipo de Revista Social Fronteriza">
                    </div>

                    <div class="publisher-content">
                        <span class="content-label">Revista científica aliada</span>
                        <h2>Revista Social Fronteriza</h2>
                        <p>
                            Revista científica comprometida con la publicación y difusión de
                            investigaciones en ciencias sociales, educación y estudios
                            interdisciplinarios vinculados con las realidades contemporáneas.
                        </p>

                        <div class="publisher-meta">
                            <span><i class="bi bi-upc-scan"></i> <strong>ISSN:</strong> 2806-5913</span>
                            <span><i class="bi bi-bookmark-check"></i> Ciencias sociales e investigación interdisciplinaria</span>
                        </div>

                        <div class="publisher-actions">
                            <a href="https://www.revistasocialfronteriza.com/"
                               class="institutional-btn"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-journal-text"></i> Visitar revista
                            </a>

                            <a href="mailto:contacto@revistasocialfronteriza.com"
                               class="institutional-btn institutional-btn-outline">
                                <i class="bi bi-envelope"></i> contacto@revistasocialfronteriza.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Luminis Editorial -->
                <div class="publisher-card" data-aos="fade-up">
                    <div class="publisher-logo">
                        <img src="{{ asset('assets/img/aliados/luminis.png') }}"
                             alt="Logotipo de Luminis Editorial">
                    </div>

                    <div class="publisher-content">
                        <span class="content-label">Editorial aliada</span>
                        <h2>Luminis Editorial</h2>
                        <p>
                            Portal editorial que agrupa revistas científicas especializadas y
                            promueve la publicación, circulación y visibilidad del conocimiento
                            académico en diferentes áreas de investigación.
                        </p>

                        <div class="publisher-actions">
                            <a href="https://luminiseditorial.com/"
                               class="institutional-btn"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-globe2"></i> Visitar portal
                            </a>

                            <a href="mailto:editor@luminiseditorial.com"
                               class="institutional-btn institutional-btn-outline">
                                <i class="bi bi-envelope"></i> editor@luminiseditorial.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Buscador -->
        <section class="journal-search-section">
            <div class="container">
                <div class="journal-search" data-aos="fade-up">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <input type="search"
                           id="searchInput"
                           placeholder="Buscar por revista, sigla o área temática..."
                           aria-label="Buscar revistas científicas"
                           oninput="filterCards()">
                </div>
            </div>
        </section>

        <!-- Revistas de Luminis -->
        <section class="journals-section">
            <div class="container">
                <div class="research-section-title text-center" data-aos="fade-up">
                    <span>Publicaciones especializadas</span>
                    <h2>Revistas científicas de Luminis Editorial</h2>
                    <p>Conoce sus áreas temáticas y accede directamente a cada portal.</p>
                </div>

                <div class="row g-4" id="journalsContainer">
                    @foreach ($revistasLuminis as $index => $revista)
                        <div class="col-xl-4 col-md-6 journal-card"
                             data-search="{{ $revista['nombre'] }} {{ $revista['sigla'] }} {{ $revista['area'] }}">
                            <article class="research-card h-100"
                                     data-aos="fade-up"
                                     data-aos-delay="{{ ($index % 3 + 1) * 100 }}">
                                <div class="research-card-logo">
                                    <img src="{{ asset($revista['logo']) }}"
                                         alt="Logotipo de {{ $revista['nombre'] }}"
                                         loading="lazy">
                                </div>

                                <div class="research-card-body">
                                    <span class="journal-acronym">{{ $revista['sigla'] }}</span>
                                    <h3>{{ $revista['nombre'] }}</h3>

                                    <div class="journal-detail">
                                        <i class="bi bi-bookmark-check"></i>
                                        <div>
                                            <strong>Área temática</strong>
                                            <p>{{ $revista['area'] }}</p>
                                        </div>
                                    </div>

                                    @if (!empty($revista['issn']))
                                        <div class="journal-detail">
                                            <i class="bi bi-upc-scan"></i>
                                            <div>
                                                <strong>ISSN</strong>
                                                <p>{{ $revista['issn'] }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="research-card-footer">
                                    <a href="{{ $revista['url'] }}"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        Visitar revista <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>

                <div id="noResults" class="no-results" hidden>
                    <i class="bi bi-search"></i>
                    <h3>No se encontraron revistas</h3>
                    <p>Prueba con otro nombre, sigla o área temática.</p>
                </div>
            </div>
        </section>
    </main>

@else

    <!-- Se conserva el contenido dinámico de Artículos Científicos -->
    <section class="articles-list-section">
        <div class="container">
            <div class="mb-4">
                <input type="text"
                       id="searchInput"
                       class="form-control form-control-lg shadow-sm"
                       placeholder="Buscar..."
                       oninput="filterCards()">
            </div>

            <div class="row" id="normativasContainer">
                @foreach ($matriz['datos'] as $dato)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 normativa-card">
                        <div class="card h-100 shadow-sm p-3 d-flex flex-column justify-content-between">
                            @if (!empty($dato->img_autor))
                                <div class="text-center">
                                    <img src="{{ asset($dato->img_autor) }}"
                                         alt="Imagen del autor"
                                         class="rounded-circle img_tablerd"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                </div>
                            @endif

                            <h4 class="text-center text-dark fw-bold mb-3"
                                style="font-size: 1.25rem;">
                                {{ $dato->name_py }}
                            </h4>

                            <p class="text-muted text-justify small mb-4 student-name">
                                {{ $dato->detalle_py }}
                            </p>

                            <a href="{{ $dato->link_py }}"
                               class="btn btn-outline-danger btn-sm mx-auto mt-auto"
                               target="_blank"
                               rel="noopener noreferrer">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endif

<style>
    .research-page {
        background-color: var(--background-color);
        color: var(--text-color);
    }

    .research-hero {
        position: relative;
        padding: 4.5rem 0 3.5rem;
        background-color: var(--background-color);
        overflow: hidden;
    }

    .research-hero::before,
    .research-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background-color: var(--accent-color);
        opacity: 0.08;
    }

    .research-hero::before {
        width: 260px;
        height: 260px;
        top: -150px;
        left: -70px;
    }

    .research-hero::after {
        width: 340px;
        height: 340px;
        right: -180px;
        bottom: -230px;
    }

    .research-hero .container {
        position: relative;
        z-index: 1;
        max-width: 950px;
    }

    .research-kicker,
    .content-label,
    .research-section-title > span {
        display: inline-block;
        margin-bottom: 0.8rem;
        color: var(--accent-color);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .research-hero h1 {
        margin-bottom: 1.2rem;
        color: var(--heading-color);
        font-size: clamp(2rem, 4vw, 3.25rem);
        font-weight: 700;
    }

    .research-hero p {
        max-width: 800px;
        margin: 0 auto;
        font-size: 1.08rem;
        line-height: 1.8;
    }

    .coedition-section {
        padding: 0 0 3rem;
    }

    .coedition-box {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        max-width: 950px;
        margin: 0 auto;
        padding: 1.4rem 1.6rem;
        background-color: #ffffff;
        border-left: 5px solid var(--accent-color);
        border-radius: 10px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
    }

    .coedition-icon {
        display: flex;
        flex: 0 0 56px;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        background-color: var(--accent-color);
        border-radius: 50%;
        color: var(--contrast-color);
        font-size: 1.6rem;
    }

    .coedition-box span {
        color: var(--accent-color);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .coedition-box p {
        margin: 0.25rem 0 0;
        color: var(--heading-color);
        font-size: 1.02rem;
        line-height: 1.6;
    }

    .publisher-section {
        padding: 1rem 0 3.5rem;
    }

    .publisher-card {
        display: grid;
        grid-template-columns: minmax(230px, 0.8fr) 2fr;
        align-items: center;
        overflow: hidden;
        background-color: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.06);
        border-radius: 14px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.09);
    }

    .publisher-card + .publisher-card {
        margin-top: 1.5rem;
    }

    .publisher-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 280px;
        padding: 2rem;
        background-color: #ffffff;
        border-right: 4px solid var(--accent-color);
    }

    .publisher-logo img {
        width: 100%;
        max-width: 310px;
        max-height: 210px;
        object-fit: contain;
    }

    .publisher-content {
        padding: 2.5rem;
    }

    .publisher-content h2,
    .research-section-title h2 {
        color: var(--heading-color);
        font-weight: 700;
    }

    .publisher-content p {
        max-width: 760px;
        line-height: 1.75;
    }

    .publisher-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem 1.2rem;
        margin-top: 1rem;
    }

    .publisher-meta span {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: var(--text-color);
        font-size: 0.9rem;
    }

    .publisher-meta i {
        color: var(--accent-color);
    }

    .publisher-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.8rem;
        margin-top: 1.5rem;
    }

    .institutional-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.15rem;
        background-color: var(--accent-color);
        border: 2px solid var(--accent-color);
        border-radius: 8px;
        color: var(--contrast-color);
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .institutional-btn:hover {
        transform: translateY(-2px);
        color: var(--contrast-color);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.14);
    }

    .institutional-btn-outline {
        background-color: transparent;
        color: var(--accent-color);
    }

    .institutional-btn-outline:hover {
        background-color: var(--accent-color);
    }

    .journal-search-section {
        padding: 0 0 3rem;
    }

    .journal-search {
        position: relative;
        max-width: 760px;
        margin: 0 auto;
    }

    .journal-search i {
        position: absolute;
        top: 50%;
        left: 1.15rem;
        color: var(--accent-color);
        font-size: 1.15rem;
        transform: translateY(-50%);
    }

    .journal-search input {
        width: 100%;
        padding: 1rem 1.2rem 1rem 3.2rem;
        background-color: #ffffff;
        border: 2px solid transparent;
        border-radius: 50px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.09);
        color: var(--text-color);
        outline: none;
        transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    .journal-search input:focus {
        border-color: var(--accent-color);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.13);
    }

    .journals-section {
        padding: 0 0 4.5rem;
    }

    .research-section-title {
        max-width: 780px;
        margin: 0 auto 2.5rem;
    }

    .research-section-title p {
        margin-bottom: 0;
    }

    .research-card {
        display: flex;
        flex-direction: column;
        overflow: hidden;
        background-color: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.07);
        border-top: 4px solid var(--accent-color);
        border-radius: 12px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .research-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.14);
    }

    .research-card-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 185px;
        padding: 1.2rem;
        background-color: #ffffff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .research-card-logo img {
        width: 100%;
        max-width: 290px;
        max-height: 150px;
        object-fit: contain;
    }

    .research-card-body {
        flex: 1;
        padding: 1.5rem 1.5rem 1rem;
    }

    .journal-acronym {
        display: inline-block;
        margin-bottom: 0.7rem;
        padding: 0.28rem 0.7rem;
        background-color: var(--background-color);
        border-radius: 30px;
        color: var(--accent-color);
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.06em;
    }

    .research-card h3 {
        min-height: 3.4rem;
        margin-bottom: 1.2rem;
        color: var(--heading-color);
        font-size: 1.18rem;
        font-weight: 700;
        line-height: 1.4;
    }

    .journal-detail {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 0.9rem;
    }

    .journal-detail > i {
        flex: 0 0 34px;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--background-color);
        border-radius: 50%;
        color: var(--accent-color);
    }

    .journal-detail strong {
        display: block;
        margin-bottom: 0.15rem;
        color: var(--heading-color);
        font-size: 0.82rem;
    }

    .journal-detail p {
        margin: 0;
        font-size: 0.88rem;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .journal-detail a {
        color: var(--accent-color);
        text-decoration: none;
    }

    .research-card-footer {
        padding: 1rem 1.5rem 1.4rem;
    }

    .research-card-footer a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.72rem 1rem;
        background-color: var(--accent-color);
        border: 2px solid var(--accent-color);
        border-radius: 8px;
        color: var(--contrast-color);
        font-weight: 600;
        text-decoration: none;
        transition: opacity 0.25s ease, transform 0.25s ease;
    }

    .research-card-footer a:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        color: var(--contrast-color);
    }

    .no-results {
        padding: 3rem 1rem;
        text-align: center;
    }

    .no-results i {
        color: var(--accent-color);
        font-size: 2.5rem;
    }

    .no-results h3 {
        margin-top: 1rem;
        color: var(--heading-color);
    }

    .articles-list-section {
        padding: 3rem 0;
    }

    @media (max-width: 991px) {
        .publisher-card {
            grid-template-columns: 1fr;
        }

        .publisher-logo {
            min-height: 220px;
            border-right: 0;
            border-bottom: 4px solid var(--accent-color);
        }
    }

    @media (max-width: 768px) {
        .research-hero {
            padding: 3rem 0 2.5rem;
        }

        .research-hero p {
            font-size: 1rem;
        }

        .coedition-box {
            align-items: flex-start;
            padding: 1.2rem;
        }

        .coedition-icon {
            flex-basis: 46px;
            width: 46px;
            height: 46px;
            font-size: 1.25rem;
        }

        .publisher-content {
            padding: 1.5rem;
        }

        .publisher-actions {
            flex-direction: column;
        }

        .institutional-btn {
            width: 100%;
        }

        .journal-search-section {
            padding-bottom: 2.3rem;
        }

        .research-section-title {
            margin-bottom: 2rem;
        }

        .research-card h3 {
            min-height: auto;
        }

    }
</style>

<script>
    function filterCards() {
        const input = document.getElementById('searchInput');

        if (!input) {
            return;
        }

        const normalizeText = (text) => text
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');

        const searchTerm = normalizeText(input.value.trim());
        const journalCards = document.querySelectorAll('.journal-card');
        const articleCards = document.querySelectorAll('.normativa-card');
        let visibleJournals = 0;

        journalCards.forEach((card) => {
            const searchableText = normalizeText(card.dataset.search || card.textContent);
            const isVisible = searchableText.includes(searchTerm);

            card.style.display = isVisible ? '' : 'none';

            if (isVisible) {
                visibleJournals++;
            }
        });

        articleCards.forEach((card) => {
            const searchableText = normalizeText(card.textContent);
            card.style.display = searchableText.includes(searchTerm) ? '' : 'none';
        });

        const noResults = document.getElementById('noResults');

        if (noResults && journalCards.length > 0) {
            noResults.hidden = visibleJournals !== 0;
        }
    }
</script>

@endsection