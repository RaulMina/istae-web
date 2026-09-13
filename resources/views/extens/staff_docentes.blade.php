
    <!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
    @extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')

<main class="main">


    <section class="container mt-100 mb-100">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="heading text-center">Staff <span class="text-primary">Docente</span></h3>
            </div>
          

            <div class="col-lg-3">
                <div class="teacher-card">
                    <div class="head">
                        <img src="images/profesores/natalia.jpg" class="img-fluid" alt="">
                        <div class="info">
                            <a href="p-morejon.html" class="btn btn-primary btn-sm">Ver Perfil</a>
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="heading">Prof.xxxxx</h5>
                        <small>Coordinadora de carreras</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="teacher-card">
                    <div class="head">
                        <img src="images/profesores/juan.jpg" class="img-fluid" alt="">
                        <div class="info">
                            <a href="p-benitez.html" class="btn btn-primary btn-sm">Ver Perfil</a>
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="heading">Prof.xxxxx</h5>
                         <small>Operaciones Turísticas</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="teacher-card">
                    <div class="head">
                        <img src="images/profesores/lorena.jpg" class="img-fluid" alt="">
                        <div class="info">
                            <a href="p-casanova.html" class="btn btn-primary btn-sm">Ver Perfil</a>
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="heading">Prof.xxxxx</h5>
                         <small>Operaciones Turísticas</small>
                    </div>
                </div>
            </div>
            
                  
            <div class="col-lg-3">
                <div class="teacher-card">
                    <div class="head">
                        <img src="images/p-Narvaez.png" class="img-fluid" alt="">
                        <div class="info">
                            <a href="p-Narvaez.html" class="btn btn-primary btn-sm">Ver Perfil</a>
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="heading">Prof.xxxxx</h5>
                        <small>Operaciones Turísticas</small>
                    </div>
                </div>
            </div>
              
            <div class="col-lg-3">
                <div class="teacher-card">
                    <div class="head">
                        <img src="images/profesores/paul.jpg" class="img-fluid" alt="">
                        <div class="info">
                            <a href="p-ona.html" class="btn btn-primary btn-sm">Ver Perfil</a>
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="heading">Prof.xxxxx</h5>
                        <small>Operaciones Turísticas</small>
                    </div>
                </div>
            </div>
             <div class="col-lg-3">
                <div class="teacher-card">
                    <div class="head">
                        <img src="images/profesores/paola.jpg" class="img-fluid" alt="">
                        <div class="info">
                            <a href="p-enriquez.html" class="btn btn-primary btn-sm">Ver Perfil</a>
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="heading">Prof.xxxxx</h5>
                        <small>Operaciones Turísticas</small>
                    </div>
                </div>
            </div>
           

            </div>
        
    </section>

  </main>



@endsection
