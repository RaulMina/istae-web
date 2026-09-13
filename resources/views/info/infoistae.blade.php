@extends('layouts.app')

@section('title', ($matriz['categoria'] ?? 'Información Institucional') . ' | ISTAE')

@section('content')
<main class="main">
  @php
    $categoria = $matriz['categoria'] ?? 'Información Institucional';
    $esConvenios = strtolower($categoria) === 'convenios';
  @endphp

  <section class="convenios-section">
    <div class="container">
      <div class="convenios-intro" data-aos="fade-up">
        <i class="{{ $esConvenios ? 'bi bi-building' : 'bi bi-info-circle' }}"></i>
        <h1 class="convenios-title">{{ $esConvenios ? 'Convenios Institucionales' : $categoria }}</h1>
        <p class="convenios-description">
          @if($esConvenios)
            Fortalecemos la cooperación interinstitucional mediante acuerdos que contribuyen a la formación académica, la vinculación con la sociedad y el desarrollo de nuestra comunidad.
          @else
            Consulta la información institucional disponible del Instituto Superior Tecnológico Alberto Enríquez.
          @endif
        </p>
      </div>

      <div class="convenios-search-container" data-aos="fade-up" data-aos-delay="100">
        <i class="bi bi-search convenios-search-icon"></i>
        <input
          type="text"
          id="buscadorConvenios"
          class="convenios-search"
          placeholder="Buscar {{ strtolower($categoria) }}..."
          autocomplete="off">
      </div>

      <div id="conveniosEmpty" class="convenios-empty">
        <i class="bi bi-journal-x"></i>
        No se encontraron registros que coincidan con la búsqueda.
      </div>

      <div class="row g-4" id="conveniosGrid">
        @forelse ($matriz['datos'] as $dato)
          <div class="col-12 col-md-6 convenio-item" data-aos="fade-up">
            <article class="convenio-card">
              <div class="convenio-badge-container">
                <span class="convenio-badge">
                  <i class="{{ $esConvenios ? 'bi bi-link-45deg' : 'bi bi-file-earmark-text' }}"></i>
                  {{ strtoupper($categoria) }}
                </span>
              </div>

              <h2 class="convenio-institution">
                {{ $dato->detalle }}
              </h2>

              <p class="convenio-type">
                {{ $esConvenios ? 'Convenio de cooperación y vinculación institucional' : 'Documento institucional disponible para consulta pública.' }}
              </p>

              <div class="mt-auto">
                @if(!empty($dato->link_normativa))
                  <a href="{{ asset($dato->link_normativa) }}" class="convenio-action" target="_blank" rel="noopener">
                    <i class="bi bi-file-earmark-pdf"></i>
                    Ver documento
                    <i class="bi bi-arrow-right"></i>
                  </a>
                @else
                  <span class="convenio-action convenio-action--disabled">
                    <i class="bi bi-file-earmark-x"></i>
                    Documento no disponible
                  </span>
                @endif
              </div>
            </article>
          </div>
        @empty
          <div class="col-12">
            <div class="convenios-empty convenios-empty--visible">
              <i class="bi bi-folder-x"></i>
              No existen registros publicados para esta categoría.
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
</main>

<style>
  .convenios-section {
    padding: 4rem 0 5rem;
    background-color: #f8f9fa;
  }

  .convenios-intro {
    text-align: center;
    max-width: 760px;
    margin: 0 auto 2.5rem;
  }

  .convenios-intro i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 54px;
    height: 54px;
    margin-bottom: 1rem;
    border-radius: 8px;
    background-color: rgba(13, 110, 253, 0.08);
    color: #0d6efd;
    font-size: 1.8rem;
  }

  .convenios-title {
    color: #212529;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .convenios-description {
    color: #6c757d;
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 0;
  }

  .convenios-search-container {
    max-width: 700px;
    margin: 0 auto 3rem;
    position: relative;
  }

  .convenios-search {
    width: 100%;
    min-height: 55px;
    padding: 0.8rem 1.25rem 0.8rem 3.2rem;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    color: #495057;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  .convenios-search:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.15);
  }

  .convenios-search-icon {
    position: absolute;
    left: 1.25rem;
    top: 50%;
    transform: translateY(-50%);
    color: #adb5bd;
    font-size: 1.25rem;
  }

  .convenios-empty {
    display: none;
    text-align: center;
    padding: 2.5rem;
    color: #6c757d;
    font-size: 1rem;
  }

  .convenios-empty i {
    display: block;
    margin-bottom: 0.75rem;
    font-size: 2.5rem;
  }

  .convenios-empty--visible {
    display: block;
    background-color: #ffffff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
  }

  .convenio-card {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 1.5rem;
    background-color: #ffffff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }

  .convenio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
  }

  .convenio-badge-container {
    margin-bottom: 1.25rem;
  }

  .convenio-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.4rem 0.9rem;
    border-radius: 999px;
    background-color: rgba(13, 110, 253, 0.08);
    color: #0d6efd;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.02em;
  }

  .convenio-institution {
    color: #212529;
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 0.75rem;
  }

  .convenio-type {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.55;
    margin-bottom: 1.5rem;
  }

  .convenio-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem 1.4rem;
    border-radius: 8px;
    background-color: #0d6efd;
    color: #ffffff;
    font-size: 0.9rem;
    font-weight: 700;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .convenio-action:hover {
    background-color: #0b5ed7;
    color: #ffffff;
  }

  .convenio-action--disabled {
    background-color: #6c757d;
    cursor: not-allowed;
  }

  @media (max-width: 767.98px) {
    .convenios-section {
      padding: 3rem 0 4rem;
    }

    .convenios-title {
      font-size: 1.65rem;
    }

    .convenio-card {
      padding: 1.25rem;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('buscadorConvenios');
    const items = document.querySelectorAll('.convenio-item');
    const emptyState = document.getElementById('conveniosEmpty');

    if (!searchInput || !emptyState) {
      return;
    }

    searchInput.addEventListener('input', function () {
      const term = searchInput.value.trim().toLowerCase(); 
      let hasResults = false;

      items.forEach(function (item) {
        const text = item.innerText.toLowerCase();
        const match = text.includes(term);
        item.classList.toggle('d-none', !match);

        if (match) {
          hasResults = true;
        }
      });

      emptyState.style.display = hasResults ? 'none' : 'block';
    });
  });
</script>
@endsection
