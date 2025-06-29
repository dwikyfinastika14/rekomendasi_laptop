@extends('dashboard.layouts.app')

@section('container')
    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
            <h1 class="h2 fw-bold">{{ $title }}</h1>
        </div>

        <!-- Info Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card shadow-sm text-center h-100 card-hover">
                    <div class="card-body">
                        <i class="fa-solid fa-memory fa-4x text-primary mb-3"></i>
                        <h5 class="card-title fw-semibold">Total RAM</h5>
                        <p class="card-text display-5 text-primary"> {{ \App\Models\Ram::sum('id') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm text-center h-100 card-hover">
                    <div class="card-body">
                        <i class="fa-solid fa-microchip fa-4x text-success mb-3"></i>
                        <h5 class="card-title fw-semibold">Total Prosesor</h5>
                        <p class="card-text display-5 text-success"> {{ \App\Models\Prosesor::sum('id') }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm text-center h-100 card-hover">
                    <div class="card-body">
                        <i class="fa-solid fa-laptop fa-4x text-warning mb-3"></i>
                        <h5 class="card-title fw-semibold">Total Laptop</h5>
                        <p class="card-text display-5 text-warning"> {{ \App\Models\Laptop::sum('id') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
