@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="mb-4">Dashboard</h2>
    <p>Hai Admin, selamat datang di database!</p>

    <!-- Cards Section -->
    <div class="row">
        <div class="col-md-3">
            <div class="card dashboard-card p-3 text-center">
                <div class="card-icon">
                    <i class="bi bi-person-fill"></i>
                </div>
                <h5 class="card-title">102</h5>
                <p class="card-text">Guru</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card dashboard-card p-3 text-center">
                <div class="card-icon">
                    <i class="bi bi-building"></i>
                </div>
                <h5 class="card-title">
                    @php
                        $instansiCount = \App\Models\Instansi::count(); // Query langsung di view
                    @endphp
                    {{ $instansiCount }}
                </h5>
                <p class="card-text">Instansi</p>
            </div>
        </div>
    </div>


    <!-- Date Filter Section -->
    <div class="card mt-4 p-4">
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="row">
                    <div class="col-md-6">
                        <label for="startDate">Start Date</label>
                        <input type="date" id="startDate" name="startDate" class="form-control" value="{{ request('startDate') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="endDate">End Date</label>
                        <input type="date" id="endDate" name="endDate" class="form-control" value="{{ request('endDate') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Filter</button>
            </form>
        </div>

    <!-- Chart Section -->
    <h4 class="mt-5">Statistik Training Guru Sobat UT School</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="chart-container" style="position: relative; height: 400px;">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Jakarta', 'Banjarmasin', 'Ujung Pandang', 'Pekanbaru', 'Samarinda'],
                datasets: [{
                    data: [37, 14, 17, 13, 15],
                    backgroundColor: ['#FFF2E2', '#FFD0B7', '#FFAD93', '#008AA5', '#006575'],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = tooltipItem.label || '';
                                var value = tooltipItem.raw || '';
                                return `${label}: ${value} units`;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
