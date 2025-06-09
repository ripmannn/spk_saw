@extends('app')
@section('content')
    <div class="py-2">
        {{-- Cek apakah pengguna sudah login --}}
        @auth
            <div class="alert alert-primary border-3 border-dark" style="border-style: solid; box-shadow: 5px 5px 0px #000;" role="alert">
                <strong>Selamat datang, {{ Auth::user()->name }}!</strong>
            </div>
            
        @else
            <p class="fs-5 fw-bold">Anda belum login.</p>
            <a href="{{ route('login') }}" class="btn btn-dark border-3 border-primary" style="border-style: solid; box-shadow: 5px 5px 0px #0d6efd; text-transform: uppercase; font-weight: bold;">Login</a>
        @endauth
        <div class="row mt-4 g-4">
            <div class="col-lg-8">
                <div class="card border-4 border-dark" style="border-style: solid; box-shadow: 8px 8px 0px #000;">
                    <div class="card-header bg-primary text-white border-bottom border-3 border-dark" style="text-transform: uppercase; font-weight: bolder;">
                        <h4 class="mb-0">Nilai Total Alternatif</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="totalChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-4 border-dark mb-4" style="border-style: solid; box-shadow: 8px 8px 0px #000;">
                    <div class="card-header bg-success text-white border-bottom border-3 border-dark" style="text-transform: uppercase; font-weight: bolder;">
                        <h4 class="mb-0">Ranking Alternatif</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="rankChart" height="200"></canvas>
                    </div>
                </div>

                <div class="card border-4 border-dark" style="border-style: solid; box-shadow: 8px 8px 0px #000;">
                    <div class="card-header bg-info text-white border-bottom border-3 border-dark" style="text-transform: uppercase; font-weight: bolder;">
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
                                <div class="list-group-item d-flex justify-content-between align-items-center mb-2 border-3 border-dark" style="border-style: solid; box-shadow: 3px 3px 0px #000;">
                                    <strong class="text-uppercase">{{ $label }}</strong>
                                    <span class="badge bg-primary rounded-0 fs-6" style="box-shadow: 2px 2px 0px #000;">{{ number_format($value, 3) }}</span>
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

            // Chart styling options for brutalism
            const brutalismChartOptions = {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'monospace',
                                weight: 'bold',
                                size: 12
                            }
                        }
                    }
                },
                elements: {
                    bar: {
                        borderWidth: 2,
                        borderColor: '#000'
                    },
                    arc: {
                        borderWidth: 2,
                        borderColor: '#000'
                    }
                }
            };

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
                                'rgba(0, 0, 0, 1)',
                                'rgba(0, 0, 0, 1)',
                                'rgba(0, 0, 0, 1)',
                                'rgba(0, 0, 0, 1)',
                                'rgba(0, 0, 0, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        ...brutalismChartOptions,
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                titleFont: {
                                    family: 'monospace',
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    family: 'monospace',
                                    size: 12
                                },
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
                                    text: 'NILAI TOTAL',
                                    font: {
                                        family: 'monospace',
                                        weight: 'bold'
                                    }
                                },
                                grid: {
                                    color: '#ddd',
                                    lineWidth: 1
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'ALTERNATIF',
                                    font: {
                                        family: 'monospace',
                                        weight: 'bold'
                                    }
                                },
                                grid: {
                                    display: false
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
                            borderWidth: 2,
                            borderColor: '#000'
                        }]
                    },
                    options: {
                        ...brutalismChartOptions,
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'right',
                                labels: {
                                    font: {
                                        family: 'monospace',
                                        weight: 'bold'
                                    },
                                    boxWidth: 15,
                                    padding: 15
                                }
                            },
                            tooltip: {
                                titleFont: {
                                    family: 'monospace',
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    family: 'monospace',
                                    size: 12
                                },
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
