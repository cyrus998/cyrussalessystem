@section('title', 'Dashboard')

<x-app-layout>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-white mb-0">Dashboard</h3>
            <h3 class="text-white mb-0"> Welcome, {{auth()->user()->name}}!</h3>
            @if (Auth()->user()->role == 'admin')
                <a class="btn btn-primary btn-sm d-none d-sm-inline-block btn-icon-split" role="button"
                    href="{{ route('report.index') }}">
                    <span class="icon text-white-50"><i class="fas fa-download fa-sm text-white-50"></i></span>
                    <span class="text">Print Report</span>
                </a>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            @if (Auth()->user()->role == 'admin')
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                        <span>Earnings Today</span>
                                    </div>
                                    <div class="text-dark fw-bold h5 mb-0">
                                        <span>Php {{ indonesia_format($todayRevenue) }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                        <span>Today's Sale</span>
                                    </div>
                                    <div class="text-dark fw-bold h5 mb-0">
                                        <span>{{ indonesia_format($todaySales) }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            @if (Auth()->user()->role == 'admin')
                                <div class="col me-2">
                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                        <span>Earnings of the Month</span>
                                    </div>
                                    <div class="text-dark fw-bold h5 mb-0">
                                        <span>Php {{ indonesia_format($monthRevenue) }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="col me-2">
                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                        <span>Sales of the Month</span>
                                    </div>
                                    <div class="text-dark fw-bold h5 mb-0">
                                        <span>{{ indonesia_format($monthSales) }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-info py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-info fw-bold text-xs mb-1">
                                    <span>Category Total</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $categories }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-tags fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-warning py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Total Product</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $products }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-box fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth()->user()->role == 'admin')
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">Income {{ indonesia_date($startDate) }} to
                                {{ indonesia_date($endDate) }}</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                    aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                        class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                    <a class="dropdown-item" href="{{ route('sale.index') }}">&nbsp;View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas>
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @push('scripts')
        @if (Auth()->user()->role == 'admin')
            <script src="{{ asset('assets/js/chart.min.min.js') }}"></script>

            <script>
                new Chart($('.chart-area canvas'), {
                    "type": "line",
                    "data": {
                        "labels": {{ json_encode($labelChart) }},
                        "datasets": [{
                            "label": "Income",
                            "fill": true,
                            "data": {{ json_encode($dataChart) }},
                            "backgroundColor": "rgba(78, 115, 223, 0.05)",
                            "borderColor": "rgba(78, 115, 223, 1)"
                        }]
                    },
                    "options": {
                        "maintainAspectRatio": false,
                        "legend": {
                            "display": false,
                            "labels": {
                                "fontStyle": "normal"
                            }
                        },
                        "title": {
                            "fontStyle": "normal"
                        },
                        "scales": {
                            "xAxes": [{
                                "gridLines": {
                                    "color": "rgb(234, 236, 244)",
                                    "zeroLineColor": "rgb(234, 236, 244)",
                                    "drawBorder": false,
                                    "drawTicks": false,
                                    "borderDash": ["2"],
                                    "zeroLineBorderDash": ["2"],
                                    "drawOnChartArea": false
                                },
                                "ticks": {
                                    "fontColor": "#858796",
                                    "fontStyle": "normal",
                                    "padding": 20
                                }
                            }],
                            "yAxes": [{
                                "gridLines": {
                                    "color": "rgb(234, 236, 244)",
                                    "zeroLineColor": "rgb(234, 236, 244)",
                                    "drawBorder": false,
                                    "drawTicks": false,
                                    "borderDash": ["2"],
                                    "zeroLineBorderDash": ["2"]
                                },
                                "ticks": {
                                    "fontColor": "#858796",
                                    "fontStyle": "normal",
                                    "padding": 20
                                }
                            }]
                        }
                    }
                })
            </script>
        @endif
    @endpush
</x-app-layout>
