<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'Panel de Administración - ISTAE')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <h1><i class="bi bi-grid-fill"></i> Panel de Administración</h1>
        <p class="text-muted">Bienvenido al sistema de gestión ISTAE</p>
    </div>

    <!-- Stats Cards Section -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon bg-primary">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-details">
                <h3>Usuarios</h3>
                <p class="stat-number">{{App\Models\User::count()}}</p>
                <div class="stat-trend positive">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>12% más este mes</span>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-info">
                <i class="bi bi-newspaper"></i>
            </div>
            <div class="stat-details">
                <h3>Noticias</h3>
                <p class="stat-number">{{App\Models\Noticiasfacebook::count()}}</p>
                <div class="stat-trend positive">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>5% más este mes</span>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-success">
                <i class="bi bi-file-text-fill"></i>
            </div>
            <div class="stat-details">
                <h3>Normativas</h3>
                <p class="stat-number">{{App\Models\Normativa::count()}}</p>
                <div class="stat-trend negative">
                    <i class="bi bi-graph-down-arrow"></i>
                    <span>3% menos este mes</span>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-warning">
                <i class="bi bi-kanban-fill"></i>
            </div>
            <div class="stat-details">
                <h3>Proyectos</h3>
                <p class="stat-number">{{App\Models\Proyecto::count()}}</p>
                <div class="stat-trend positive">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span>8% más este mes</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-container">
        <div class="chart-card">
            <h3><i class="bi bi-bar-chart-line-fill"></i> Actividad Mensual</h3>
            <canvas id="activityChart"></canvas>
        </div>
        <div class="chart-card">
            <h3><i class="bi bi-pie-chart-fill"></i> Distribución de Contenido</h3>
            <canvas id="distributionChart"></canvas>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="recent-activity">
        <h3><i class="bi bi-clock-history"></i> Actividad Reciente</h3>
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon bg-info">
                    <i class="bi bi-file-earmark-plus"></i>
                </div>
                <div class="activity-details">
                    <p>Nueva normativa añadida</p>
                    <small><i class="bi bi-clock"></i> Hace 2 horas</small>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon bg-success">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div class="activity-details">
                    <p>Nuevo usuario registrado</p>
                    <small><i class="bi bi-clock"></i> Hace 3 horas</small>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon bg-warning">
                    <i class="bi bi-facebook"></i>
                </div>
                <div class="activity-details">
                    <p>Nueva publicación en Facebook</p>
                    <small><i class="bi bi-clock"></i> Hace 5 horas</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu Section -->
    <div class="menu-grid">
        <a href="{{route('user.index')}}" class="menu-card">
            <div class="menu-icon">
                <i class="bi bi-people"></i>
            </div>
            <h3>Gestión de Usuarios</h3>
            <p>Administrar usuarios y permisos</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>

        <a href="{{route('facebook_noticias.index')}}" class="menu-card">
            <div class="menu-icon">
                <i class="bi bi-facebook"></i>
            </div>
            <h3>Facebook Noticias</h3>
            <p>Gestionar publicaciones en Facebook</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>

        <a href="{{route('normativa.index')}}" class="menu-card">
            <div class="menu-icon">
                <i class="bi bi-file-text"></i>
            </div>
            <h3>Normativas CPN</h3>
            <p>Administrar normativas y regulaciones</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>

        <a href="{{route('infoistae.index')}}" class="menu-card">
            <div class="menu-icon">
                <i class="bi bi-info-circle"></i>
            </div>
            <h3>Info ISTAE</h3>
            <p>Gestionar información institucional</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>

        <a href="{{route('proyectos.index')}}" class="menu-card">
            <div class="menu-icon">
                <i class="bi bi-kanban"></i>
            </div>
            <h3>Proyectos</h3>
            <p>Administrar proyectos registrados</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>
<a href="{{route('solicitudes.index')}}" class="menu-card">
            <div class="menu-icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <h3>Solicitudes</h3>
            <p>Gestionar solicitudes de prácticas</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>
        <a href="{{route('exit')}}" class="menu-card menu-card-danger">
            <div class="menu-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>
            <h3>Cerrar Sesión</h3>
            <p>Salir del sistema</p>
            <div class="menu-action">
                <span class="btn-action"><i class="bi bi-arrow-right-circle"></i></span>
            </div>
        </a>
    </div>
</div>

<style>
:root {
    --primary-color: #1565c0;
    --secondary-color: #00b8f4;
    --background-color: #f0f8ff;
    --text-color: #234567;
    --white: #ffffff;
    --danger: #dc3545;
    --success: #28a745;
    --warning: #ffc107;
    --info: #17a2b8;
}

.dashboard-container {
    padding: 2rem;
    background-color: var(--background-color);
    min-height: calc(100vh - 60px);
}

.dashboard-header {
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: var(--white);
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.dashboard-header h1 {
    color: var(--primary-color);
    font-size: 2rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: var(--white);
    border-radius: 15px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--white);
}

.bg-primary { background-color: var(--primary-color); }
.bg-info { background-color: var(--info); }
.bg-success { background-color: var(--success); }
.bg-warning { background-color: var(--warning); }

.stat-details h3 {
    color: var(--text-color);
    margin: 0;
    font-size: 1rem;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: bold;
    color: var(--primary-color);
    margin: 0.25rem 0;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.25rem 0.5rem;
    border-radius: 20px;
    font-size: 0.875rem;
    background: rgba(0,0,0,0.05);
}

.stat-trend.positive {
    background: rgba(40,167,69,0.1);
    color: var(--success);
}

.stat-trend.negative {
    background: rgba(220,53,69,0.1);
    color: var(--danger);
}

.charts-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.chart-card {
    background: var(--white);
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.chart-card h3 {
    color: var(--text-color);
    margin-bottom: 1rem;
    font-size: 1.25rem;
}

.recent-activity {
    background: var(--white);
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.recent-activity h3 {
    color: var(--text-color);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.activity-list {
    display: grid;
    gap: 1rem;
}

.activity-item {
    position: relative;
    padding-left: 3rem;
}

.activity-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
}

.activity-details p {
    margin: 0;
    color: var(--text-color);
}

.activity-details small {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.menu-card {
    position: relative;
    background: var(--white);
    border-radius: 15px;
    padding: 2rem;
  text-align: center;
  text-decoration: none;
    color: var(--text-color);
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
}

.menu-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.menu-icon {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.menu-card:hover .menu-icon {
    transform: scale(1.1);
}

.menu-action {
    position: absolute;
    bottom: 1rem;
    right: 1rem;
    opacity: 0;
    transition: all 0.3s ease;
}

.menu-card:hover .menu-action {
    opacity: 1;
    transform: translateX(-10px);
}

.btn-action {
    font-size: 1.5rem;
    color: var(--primary-color);
}

.menu-card-danger .btn-action {
    color: var(--danger);
}

.menu-card-danger {
    border: 2px solid var(--danger);
}

.menu-card-danger:hover {
    background-color: var(--danger);
    color: var(--white);
}

.menu-card-danger:hover .menu-icon,
.menu-card-danger:hover h3,
.menu-card-danger:hover p {
    color: var(--white);
}

@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }

    .stats-container,
    .charts-container,
    .menu-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-header h1 {
        font-size: 1.5rem;
    }

    .menu-action {
        opacity: 1;
        transform: none;
    }
}
</style>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Datos de ejemplo para las gráficas
document.addEventListener('DOMContentLoaded', function() {
    // Gráfica de Actividad Mensual
    const activityCtx = document.getElementById('activityChart').getContext('2d');
    new Chart(activityCtx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Usuarios',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: '#1565c0',
                tension: 0.4
            }, {
                label: 'Noticias',
                data: [5, 10, 8, 15, 12, 9],
                borderColor: '#00b8f4',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Gráfica de Distribución
    const distributionCtx = document.getElementById('distributionChart').getContext('2d');
    new Chart(distributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Usuarios', 'Noticias', 'Normativas', 'Proyectos'],
            datasets: [{
                data: [30, 25, 20, 25],
                backgroundColor: [
                    '#1565c0',
                    '#00b8f4',
                    '#28a745',
                    '#ffc107'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
});
</script>

@endsection



