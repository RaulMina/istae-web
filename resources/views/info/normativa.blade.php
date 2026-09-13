<!-- Vista de Reglamentos y Normativas -->
@extends('layouts.app')

@section('title', 'ISTAE')

@section('content')

<style>
  /*
   * La interfaz utiliza únicamente los colores configurados
   * actualmente en Bootstrap para conservar la identidad del sitio.
   */

  .normativas-page {
    min-height: 100vh;
    background-color: var(--bs-light);
  }

  /* Encabezado original del sitio */
  .normativas-page .page-title {
    border-bottom: 1px solid var(--bs-border-color);
  }

  .normativas-page .page-title h1 {
    font-size: clamp(1.7rem, 4vw, 2.3rem);
  }

  .normativas-page .page-title p {
    max-width: 720px;
    line-height: 1.6;
  }

  /* Contenido principal */
  .normativas-content {
    padding-top: 40px;
    padding-bottom: 70px;
  }

  /* Panel del buscador */
  .search-panel {
    padding: 24px;
    border: 1px solid var(--bs-border-color);
    border-radius: 16px;
    background-color: var(--bs-white);
    box-shadow: var(--bs-box-shadow-sm);
  }

  .search-label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
  }

  .search-wrapper {
    position: relative;
  }

  .search-wrapper .search-icon {
    position: absolute;
    top: 50%;
    left: 17px;
    z-index: 2;
    color: var(--bs-secondary);
    font-size: 1.05rem;
    transform: translateY(-50%);
    pointer-events: none;
  }

  .search-wrapper .form-control {
    min-height: 52px;
    padding: 12px 48px;
    border-radius: 10px;
    background-color: var(--bs-light);
    transition:
      border-color 0.2s ease,
      background-color 0.2s ease,
      box-shadow 0.2s ease;
  }

  .search-wrapper .form-control:focus {
    border-color: var(--bs-primary);
    background-color: var(--bs-white);
    box-shadow:
      0 0 0 0.25rem
      rgba(var(--bs-primary-rgb), 0.15);
  }

  .clear-search {
    position: absolute;
    top: 50%;
    right: 12px;
    display: none;
    width: 34px;
    height: 34px;
    padding: 0;
    align-items: center;
    justify-content: center;
    border: 0;
    border-radius: 50%;
    color: var(--bs-secondary);
    background-color: transparent;
    transform: translateY(-50%);
    transition:
      color 0.2s ease,
      background-color 0.2s ease;
  }

  .clear-search:hover {
    color: var(--bs-primary);
    background-color: rgba(var(--bs-primary-rgb), 0.10);
  }

  .clear-search:focus-visible {
    outline: 3px solid rgba(var(--bs-primary-rgb), 0.20);
  }

  .search-information {
    margin-top: 12px;
    margin-bottom: 0;
    color: var(--bs-secondary);
    font-size: 0.9rem;
  }

  .search-information strong {
    color: var(--bs-primary);
  }

  /* Secciones de reglamentos */
  .normativa-section {
    margin-top: 45px;
  }

  .section-heading {
    display: flex;
    margin-bottom: 22px;
    align-items: center;
    gap: 14px;
  }

  .section-heading-icon {
    display: flex;
    width: 46px;
    height: 46px;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    color: var(--bs-primary);
    background-color: rgba(var(--bs-primary-rgb), 0.10);
    font-size: 1.25rem;
  }

  .section-heading-content {
    flex-shrink: 0;
  }

  .section-heading h2 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
  }

  .section-heading p {
    margin: 4px 0 0;
    color: var(--bs-secondary);
    font-size: 0.9rem;
  }

  .section-heading-line {
    height: 2px;
    flex-grow: 1;
    background-color: var(--bs-border-color);
  }

  .section-counter {
    min-width: 36px;
    padding: 5px 11px;
    border-radius: 20px;
    color: var(--bs-primary);
    background-color: rgba(var(--bs-primary-rgb), 0.10);
    font-size: 0.82rem;
    font-weight: 700;
    text-align: center;
  }

  /* Tarjetas */
  .normativa-card {
    position: relative;
    height: 100%;
    overflow: hidden;
    border: 1px solid var(--bs-border-color);
    border-radius: 15px;
    background-color: var(--bs-white);
    box-shadow: var(--bs-box-shadow-sm);
    transition:
      border-color 0.25s ease,
      box-shadow 0.25s ease,
      transform 0.25s ease;
  }

  .normativa-card::before {
    display: block;
    width: 100%;
    height: 4px;
    content: "";
    background-color: var(--bs-primary);
  }

  .normativa-card:hover {
    border-color: rgba(var(--bs-primary-rgb), 0.35);
    box-shadow: var(--bs-box-shadow);
    transform: translateY(-4px);
  }

  .normativa-card-body {
    display: flex;
    height: calc(100% - 4px);
    padding: 22px;
    flex-direction: column;
  }

  .document-header {
    display: flex;
    margin-bottom: 18px;
    align-items: flex-start;
    gap: 14px;
  }

  .document-icon {
    display: flex;
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    color: var(--bs-primary);
    background-color: rgba(var(--bs-primary-rgb), 0.10);
    font-size: 1.4rem;
  }

  .document-information {
    min-width: 0;
    flex-grow: 1;
  }

  .document-category {
    display: inline-block;
    margin-bottom: 5px;
    color: var(--bs-primary);
    font-size: 0.74rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
  }

  .normativa-description {
    display: -webkit-box;
    margin: 0;
    overflow: hidden;
    color: var(--bs-body-color);
    font-size: 0.97rem;
    font-weight: 500;
    line-height: 1.6;
    text-align: left;
    overflow-wrap: anywhere;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 5;
  }

  .document-action {
    margin-top: auto;
    padding-top: 18px;
    border-top: 1px solid var(--bs-border-color);
  }

  .document-action .btn {
    display: flex;
    width: 100%;
    min-height: 43px;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    font-weight: 600;
    gap: 8px;
    transition:
      color 0.2s ease,
      background-color 0.2s ease,
      border-color 0.2s ease,
      transform 0.2s ease;
  }

  .document-action .btn:hover {
    transform: translateY(-1px);
  }

  /* Mensaje cuando una categoría no contiene documentos */
  .empty-category {
    display: none;
    padding: 35px 20px;
    border: 1px dashed var(--bs-border-color);
    border-radius: 15px;
    color: var(--bs-secondary);
    background-color: var(--bs-white);
    text-align: center;
  }

  .empty-category i {
    display: block;
    margin-bottom: 12px;
    color: var(--bs-secondary);
    font-size: 2rem;
  }

  /* Mensaje sin resultados */
  .no-results {
    display: none;
    margin-top: 40px;
    padding: 45px 25px;
    border: 1px solid var(--bs-border-color);
    border-radius: 16px;
    background-color: var(--bs-white);
    box-shadow: var(--bs-box-shadow-sm);
    text-align: center;
  }

  .no-results-icon {
    display: flex;
    width: 68px;
    height: 68px;
    margin: 0 auto 18px;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: var(--bs-primary);
    background-color: rgba(var(--bs-primary-rgb), 0.10);
    font-size: 1.8rem;
  }

  .no-results h3 {
    margin-bottom: 8px;
    font-size: 1.2rem;
    font-weight: 700;
  }

  .no-results p {
    margin-bottom: 0;
    color: var(--bs-secondary);
  }

  /* Diseño responsive */
  @media (max-width: 767.98px) {
    .normativas-content {
      padding-top: 30px;
      padding-bottom: 50px;
    }

    .search-panel {
      padding: 18px;
      border-radius: 14px;
    }

    .normativa-section {
      margin-top: 35px;
    }

    .section-heading {
      align-items: flex-start;
    }

    .section-heading-content {
      flex-grow: 1;
    }

    .section-heading-line {
      display: none;
    }

    .section-heading h2 {
      font-size: 1.1rem;
    }

    .normativa-card-body {
      padding: 18px;
    }
  }

  @media (max-width: 575.98px) {
    .normativas-page .page-title h1 {
      font-size: 1.55rem;
    }

    .section-heading-icon {
      width: 42px;
      height: 42px;
      font-size: 1.1rem;
    }

    .document-header {
      gap: 12px;
    }

    .document-icon {
      width: 44px;
      height: 44px;
      font-size: 1.25rem;
    }
  }

  /* Accesibilidad: reduce animaciones si el usuario lo solicita */
  @media (prefers-reduced-motion: reduce) {
    .normativa-card,
    .document-action .btn,
    .clear-search,
    .search-wrapper .form-control {
      transition: none;
    }

    .normativa-card:hover,
    .document-action .btn:hover {
      transform: none;
    }
  }
</style>

<main class="main normativas-page">

  <!-- Título principal: conserva los colores del código original -->
  <div class="page-title py-4 bg-light shadow-sm" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">

      <div>
        <h1 class="mb-2 text-primary fw-bold">
          Reglamentos y Normativas
        </h1>

        <p class="mb-0 text-secondary">
          Consulta los reglamentos internos y externos del ISTAE.
        </p>
      </div>

    </div>
  </div>

  <!-- Contenido principal -->
  <section class="container normativas-content">

    <!-- Buscador -->
    <div class="search-panel" data-aos="fade-up">

      <label
        for="searchInput"
        class="search-label text-primary"
      >
        Buscar un documento
      </label>

      <div class="search-wrapper">

        <i
          class="bi bi-search search-icon"
          aria-hidden="true"
        ></i>

        <input
          type="search"
          id="searchInput"
          class="form-control"
          placeholder="Escriba el nombre o una palabra clave..."
          autocomplete="off"
          aria-describedby="searchInformation"
        >

        <button
          type="button"
          id="clearSearch"
          class="clear-search"
          aria-label="Limpiar búsqueda"
          title="Limpiar búsqueda"
        >
          <i class="bi bi-x-lg" aria-hidden="true"></i>
        </button>

      </div>

      <p
        id="searchInformation"
        class="search-information"
        aria-live="polite"
      >
        Se encontraron
        <strong id="resultsCount">0</strong>
        documentos disponibles.
      </p>

    </div>

    <!-- Contenedor de reglamentos -->
    <div id="normativasContainer">

      <!-- Reglamentos internos -->
      <section
        class="normativa-section"
        data-category-section
        data-category-name="Reglamentos internos"
        data-aos="fade-up"
      >

        <div class="section-heading">

          <div class="section-heading-icon" aria-hidden="true">
            <i class="bi bi-building"></i>
          </div>

          <div class="section-heading-content">
            <h2 class="text-uppercase text-secondary">
              Reglamentos internos
            </h2>

            <p>
              Documentos institucionales de aplicación interna.
            </p>
          </div>

          <div class="section-heading-line"></div>

          <span
            class="section-counter"
            data-section-counter
            aria-label="0 documentos"
          >
            0
          </span>

        </div>

        <div class="row g-4" data-card-container>

          @foreach ($datos as $dato)

            @if (trim($dato->categoria) === 'REGLAMENTOS INTERNOS')

              <div
                class="col-12 col-md-6 col-xl-4 normativa-item"
                data-normativa-card
              >

                <article class="normativa-card">

                  <div class="normativa-card-body">

                    <div class="document-header">

                      <div class="document-icon" aria-hidden="true">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                      </div>

                      <div class="document-information">

                        <span class="document-category">
                          Reglamento interno
                        </span>

                        <p class="normativa-description">
                          {{ $dato->detalle }}
                        </p>

                      </div>

                    </div>

                    <div class="document-action">

                      <!-- Se conserva la ruta original del PDF -->
                      <a
                        href="{{ route('ver.archivo', ['path' => $dato->link_normativa]) }}"
                        class="btn btn-outline-primary btn-sm"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Descargar PDF: {{ $dato->detalle }}"
                      >
                        <i
                          class="bi bi-file-earmark-pdf-fill"
                          aria-hidden="true"
                        ></i>

                        Descargar PDF

                        <i
                          class="bi bi-box-arrow-up-right ms-1"
                          aria-hidden="true"
                        ></i>
                      </a>

                    </div>

                  </div>

                </article>

              </div>

            @endif

          @endforeach

          <div class="col-12 empty-category-container">
            <div class="empty-category" data-empty-category>

              <i
                class="bi bi-folder2-open"
                aria-hidden="true"
              ></i>

              <p class="mb-0">
                No existen reglamentos internos disponibles.
              </p>

            </div>
          </div>

        </div>

      </section>

      <!-- Reglamentos externos -->
      <section
        class="normativa-section"
        data-category-section
        data-category-name="Reglamentos externos"
        data-aos="fade-up"
      >

        <div class="section-heading">

          <div class="section-heading-icon" aria-hidden="true">
            <i class="bi bi-globe-americas"></i>
          </div>

          <div class="section-heading-content">
            <h2 class="text-uppercase text-secondary">
              Reglamentos externos
            </h2>

            <p>
              Normativas emitidas por organismos externos competentes.
            </p>
          </div>

          <div class="section-heading-line"></div>

          <span
            class="section-counter"
            data-section-counter
            aria-label="0 documentos"
          >
            0
          </span>

        </div>

        <div class="row g-4" data-card-container>

          @foreach ($datos as $dato)

            @if (trim($dato->categoria) === 'REGLAMENTOS EXTERNOS')

              <div
                class="col-12 col-md-6 col-xl-4 normativa-item"
                data-normativa-card
              >

                <article class="normativa-card">

                  <div class="normativa-card-body">

                    <div class="document-header">

                      <div class="document-icon" aria-hidden="true">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                      </div>

                      <div class="document-information">

                        <span class="document-category">
                          Reglamento externo
                        </span>

                        <p class="normativa-description">
                          {{ $dato->detalle }}
                        </p>

                      </div>

                    </div>

                    <div class="document-action">

                      <!-- Se conserva la ruta original del PDF -->
                      <a
                        href="{{ route('ver.archivo', ['path' => $dato->link_normativa]) }}"
                        class="btn btn-outline-primary btn-sm"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Descargar PDF: {{ $dato->detalle }}"
                      >
                        <i
                          class="bi bi-file-earmark-pdf-fill"
                          aria-hidden="true"
                        ></i>

                        Descargar PDF

                        <i
                          class="bi bi-box-arrow-up-right ms-1"
                          aria-hidden="true"
                        ></i>
                      </a>

                    </div>

                  </div>

                </article>

              </div>

            @endif

          @endforeach

          <div class="col-12 empty-category-container">
            <div class="empty-category" data-empty-category>

              <i
                class="bi bi-folder2-open"
                aria-hidden="true"
              ></i>

              <p class="mb-0">
                No existen reglamentos externos disponibles.
              </p>

            </div>
          </div>

        </div>

      </section>

      <!-- Mensaje cuando la búsqueda no tiene coincidencias -->
      <div id="noResults" class="no-results" role="status">

        <div class="no-results-icon" aria-hidden="true">
          <i class="bi bi-search"></i>
        </div>

        <h3 class="text-secondary">
          No se encontraron documentos
        </h3>

        <p>
          Intente realizar la búsqueda con otro nombre
          o una palabra clave diferente.
        </p>

      </div>

    </div>

  </section>

</main>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const clearSearchButton = document.getElementById('clearSearch');
    const resultsInformation = document.getElementById(
      'searchInformation'
    );
    const noResults = document.getElementById('noResults');

    const cards = document.querySelectorAll(
      '[data-normativa-card]'
    );

    const sections = document.querySelectorAll(
      '[data-category-section]'
    );

    /**
     * Convierte el texto a minúsculas, elimina tildes
     * y normaliza los espacios.
     */
    function normalizeText(text) {
      return text
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/\s+/g, ' ')
        .trim();
    }

    /**
     * Actualiza el mensaje con la cantidad
     * de documentos encontrados.
     */
    function updateResultsMessage(total) {
      if (total === 1) {
        resultsInformation.innerHTML =
          'Se encontró <strong id="resultsCount">1</strong> ' +
          'documento disponible.';

        return;
      }

      resultsInformation.innerHTML =
        'Se encontraron <strong id="resultsCount">' +
        total +
        '</strong> documentos disponibles.';
    }

    /**
     * Filtra los documentos.
     */
    function filterCards() {
      const searchTerm = normalizeText(searchInput.value);
      let totalVisible = 0;

      cards.forEach(function (card) {
        const descriptionElement = card.querySelector(
          '.normativa-description'
        );

        const categoryElement = card.querySelector(
          '.document-category'
        );

        const description = descriptionElement
          ? descriptionElement.textContent
          : '';

        const category = categoryElement
          ? categoryElement.textContent
          : '';

        const searchableText = normalizeText(
          description + ' ' + category
        );

        const isVisible = searchableText.includes(searchTerm);

        card.style.display = isVisible ? '' : 'none';

        if (isVisible) {
          totalVisible++;
        }
      });

      /**
       * Actualiza el contador de cada sección.
       */
      sections.forEach(function (section) {
        const sectionCards = section.querySelectorAll(
          '[data-normativa-card]'
        );

        const visibleCards = Array.from(sectionCards).filter(
          function (card) {
            return card.style.display !== 'none';
          }
        );

        const counter = section.querySelector(
          '[data-section-counter]'
        );

        const emptyCategory = section.querySelector(
          '[data-empty-category]'
        );

        if (counter) {
          counter.textContent = visibleCards.length;

          counter.setAttribute(
            'aria-label',
            visibleCards.length === 1
              ? '1 documento'
              : visibleCards.length + ' documentos'
          );
        }

        /*
         * Si no hay documentos registrados en una categoría,
         * se muestra su mensaje de estado vacío.
         */
        if (emptyCategory) {
          emptyCategory.style.display =
            sectionCards.length === 0 && searchTerm === ''
              ? 'block'
              : 'none';
        }

        /*
         * Durante una búsqueda se ocultan las categorías
         * que no contienen coincidencias.
         */
        if (searchTerm !== '') {
          section.style.display =
            visibleCards.length > 0 ? '' : 'none';
        } else {
          section.style.display = '';
        }
      });

      updateResultsMessage(totalVisible);

      clearSearchButton.style.display =
        searchInput.value.length > 0
          ? 'flex'
          : 'none';

      noResults.style.display =
        totalVisible === 0 &&
        searchTerm !== '' &&
        cards.length > 0
          ? 'block'
          : 'none';
    }

    /**
     * Limpia la búsqueda y restaura la vista.
     */
    function clearSearch() {
      searchInput.value = '';
      filterCards();
      searchInput.focus();
    }

    searchInput.addEventListener('input', filterCards);

    clearSearchButton.addEventListener(
      'click',
      clearSearch
    );

    /*
     * Permite limpiar la búsqueda presionando Escape.
     */
    searchInput.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        clearSearch();
      }
    });

    /*
     * Inicializa los contadores cuando carga la página.
     */
    filterCards();
  });
</script>

@endsection