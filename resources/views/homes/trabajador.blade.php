@extends('layouts.layout')

@section('titulo', 'Home')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inicio</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        @if (auth()->user()->role=="coordinador")
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Solicitudes creadas: </div>
                            <div id="countCreadas" class="h5 mb-0 font-weight-bold text-gray-800">{{ $createdCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hammer fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else 
        <div id="countCreadas" class="h5 mb-0 font-weight-bold text-gray-800 " hidden>{{ $createdCount }}</div>
        @endif

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Solicitudes pendientes: </div>
                            <div id="countPendientes" class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Solicitudes aceptadas</div>
                            <div id="countAceptadas" class="h5 mb-0 font-weight-bold text-gray-800"> {{ $aceptedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Solicitudes denegadas</div>
                            <div id="countDenegadas" class="h5 mb-0 font-weight-bold text-gray-800"> {{ $deniedCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">


        <!-- Pie Chart -->
        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Solicitudes</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2 ">
                            <i class="fas fa-circle text-primary verde"></i><span> Aceptadas</span><span class="data" hidden>{{ $aceptedCount }}</span>
                        </span>
                        <span class="mr-2 ">
                            <i class="fas fa-circle text-success rojo"></i><span> Denegadas</span><span class="data" hidden>{{ $deniedCount }}</span>
                        </span><br>
                        <span class="mr-2 ">
                            <i class="fas fa-circle text-info naranja"></i><span> En espera</span><span class="data" hidden>{{ $pendingCount }}</span>
                        </span>
                        <span class="mr-2 ">
                            <i class="fas fa-circle text-info gris"></i><span> Creadas</span><span class="data" hidden>{{ $createdCount }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>



        <div  class="card shadow mb-4 col-xl-6 col-lg-6 no_padding">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Obras por tipo de construcción</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
                <p hidden id="demolicion">{{ $demolicion }}</p>
                <p hidden id="reforma">{{ $reforma }}</p>
                <p hidden id="construccion">{{ $construccion }}</p>


            </div>
        </div>





    </div>

    <div class="col-xl-12 col-lg-12 p-0">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Mapa de obras</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="pt-4 pb-2">
                    <div id="mapid"></div>
                </div>

            </div>
        </div>
    </div>
    <p id="cordenadas" hidden>{{ $cordenadas }}</p>
@endsection
