@extends('app')
@section('content')
    <div class="container py-4">
        {{-- Cek apakah pengguna sudah login --}}
        @auth
            <div class="alert alert-primary" role="alert">
                Selamat datang, {{ Auth::user()->name }}!
            </div>
            
        @else
            <p>Anda belum login.</p>
            <a href="{{ route('login') }}">Login</a>
        @endauth
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Nilai Total Alternatif</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="totalChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Ranking Alternatif</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="rankChart" height="200"></canvas>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Top 3 Alternatif</h4>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @php
                                $sortedData = array_combine($chartData['labels'], $chartData['values']);
                                arsort($sortedData);
                                $top3 = array_slice($sortedData, 0, 3, true);
                            @endphp

                            @foreach ($top3 as $label => $value)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $label }}
                                    <span class="badge bg-primary rounded-pill">{{ number_format($value, 3) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data dari controller
            const chartData = @json($chartData);

            console.log('Data diterima di JavaScript:', chartData);

            // Chart Nilai Total (Bar Chart)
            new Chart(
                document.getElementById('totalChart'), {
                    type: 'bar',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Nilai Total',
                            data: chartData.values,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Nilai: ${context.raw.toFixed(3)}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Nilai Total'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Alternatif'
                                }
                            }
                        }
                    }
                }
            );

            // Chart Ranking (Doughnut Chart)
            new Chart(
                document.getElementById('rankChart'), {
                    type: 'doughnut',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Ranking',
                            data: chartData.ranks,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'right',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Rank ${context.raw}`;
                                    }
                                }
                            }
                        }
                    }
                }
            );
        </script>
    @endpush
@endsection
