<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">DOCENTES Y ADMINISTRATIVOS</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('home')}}">Inicio</a></li>
          <li class="current">DOCENTES Y ADMINISTRATIVOS</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->

  <!-- Services Section -->
  <section id="services" class="services section">
    <div class="container">
      <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar..." onkeyup="filterCards()">
    </div>

    <div class="container">
      <div class="row" id="cardContainer">
        @foreach($datos as $dato)
        <div class="col-lg-4 col-md-6 card-item" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div>
              <img src="../../{{ $dato['img'] }}" alt="Profile" class="rounded-circle img_tablerd img_docente" style="width:100px;">
            </div>
            <div class="datios_docente">
              <h3 class="student-name texto-mayusculas">{{ $dato['firstname_lastname'] }}</h3>
              <h4 class="texto-mayusculas">{{ $dato['cargo'] }}</h4>
            </div>
            <p class="texto-mayusculas">{{ $dato['detalle'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- /Services Section -->

  <script>
    function filterCards() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const cards = document.querySelectorAll(".card-item");

      cards.forEach(card => {
        const name = card.querySelector(".student-name").textContent.toLowerCase();
        if (name.includes(input)) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    }
  </script>

</main>




@endsection
