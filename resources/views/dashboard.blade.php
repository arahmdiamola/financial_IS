<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> -->

    <x-slot name="body_container">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col">
                        <div class="card border-success border-bottom border-3 border-0">
                            <div class="card-body">
                                <div class="jumbotron">
                                    <?php
                                        $users = \App\Models\User::where('organization', Auth::user()->organization)->pluck('id');
                                        $base_income = \App\Models\income::where('organization', Auth::user()->organization);
                                        $income = $base_income->sum('amount');
                                        $base_expenses = \App\Models\expense::where('user', $users->toArray());
                                        $expenses = $base_expenses->sum('amount');
                                        $savings = $income - $expenses;
                                    ?>
                                  <h3 class="display-5">Budget Status</h3>
                                  <h4 class="text-center mt-5 mb-4">Looking Good {{ Auth::user()->name }}!</h4>
                                  <p class="lead">You have spent P{{ $expenses }} which is one percent more than your expected monthly budget you have nothing left to spend.</p>
                                  <hr class="my-4">
                                  
                                  <p class="lead">
                                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                                  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div id="chart7"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                    <div class="card-header">
                        <h4>Budget Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="transaction-progress">
                            <div class="item mt-5">
                                <strong class="pull-right" style="float:right;">{{$base_expenses->count()}} Transactions</strong>
                                <p class="text-muted"> <i class="mdi mdi-checkbox-blank-circle-outline text-info"></i> Expenses</p>
                                <div class="progress progress-bar-primary-alt">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width:67%">
                                    </div>
                                </div>
                            </div>
                            <div class="item mt-3">
                                <strong class="pull-right"  style="float:right;">{{$base_income->count()}} Transactions</strong>
                                <p class="text-muted"> <i class="mdi mdi-checkbox-blank-circle-outline text-primary"></i> Income</p>
                                <div class="progress progress-bar-success-alt">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width:33%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="row transaction-links">
                                    <p class="text-center view-all-transaction">View all transaction records</p>
                                <div class="col-md-3 offset-md-3">
                                    <a href="/ExpenseIncomeTracker/expenses/" class="form-control btn btn-danger" type="button">Expenses</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="/ExpenseIncomeTracker/income/" class="form-control btn btn-primary" type="button">Income</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </x-slot>

    <x-slot  name="javascript">
        <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

        <script src="assets/plugins/highcharts/js/highcharts.js"></script>
        <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
        <!-- <script src="assets/js/index2.js"></script> -->

        <script type="text/javascript">
            $(function() {
                        "use strict";
                        var e = {
                            series: [{
                                name: "Sessions",
                                data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5]
                            }],
                            chart: {
                                foreColor: "#9ba7b2",
                                height: 310,
                                type: "area",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !0
                                },
                                dropShadow: {
                                    enabled: !0,
                                    top: 3,
                                    left: 14,
                                    blur: 4,
                                    opacity: .1
                                }
                            },
                            stroke: {
                                width: 5,
                                curve: "smooth"
                            },
                            xaxis: {
                                //type: "datetime",
                                categories: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC']
                            },
                            title: {
                                text: "Sessions",
                                align: "left",
                                style: {
                                    fontSize: "16px",
                                    color: "#666"
                                }
                            },
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shade: "light",
                                    gradientToColors: ["#0d6efd"],
                                    shadeIntensity: 1,
                                    type: "vertical",
                                    opacityFrom: .7,
                                    opacityTo: .2,
                                    stops: [0, 100, 100, 100]
                                }
                            },
                            markers: {
                                size: 5,
                                colors: ["#0d6efd"],
                                strokeColors: "#fff",
                                strokeWidth: 2,
                                hover: {
                                    size: 7
                                }
                            },
                            dataLabels: {
                                enabled: !1
                            },
                            colors: ["#0d6efd"],
                            grid: {
                                show: true,
                                borderColor: 'rgba(0, 0, 0, 0.15)',
                                strokeDashArray: 4,
                            }
                        };

                        new Highcharts.chart("chart7", {
                            chart: {
                                height: 350,
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: !1,
                                type: "pie",
                                styledMode: !0
                            },
                            credits: {
                                enabled: !1
                            },
                            title: {
                                text: "Transactions"
                            },
                            subtitle: {
                                text: ""
                            },
                            tooltip: {
                                pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
                            },
                            accessibility: {
                                point: {
                                    valueSuffix: "%"
                                }
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: !0,
                                    cursor: "pointer",
                                    innerSize: 120,
                                    dataLabels: {
                                        enabled: !0,
                                        format: "<b>{point.name}</b>: {point.percentage:.1f} %"
                                    },
                                    showInLegend: !0
                                }
                            },
                            series: [{
                                name: "Users",
                                colorByPoint: !0,
                                data: [{
                                    name: "Income",
                                    y: {{$income}} 
                                }, {
                                    name: "Expensis",
                                    y: {{$expenses}}
                                }, {
                                    name: "Savings",
                                    y: {{$savings}}
                                }]
                            }],
                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 500
                                    },
                                    chartOptions: {
                                        plotOptions: {
                                            pie: {
                                                innerSize: 140,
                                                dataLabels: {
                                                    enabled: !1
                                                }
                                            }
                                        }
                                    }
                                }]
                            }
                        });
                        
                    });
        </script>
    </x-slot>

</x-app-layout>
