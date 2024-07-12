@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Tablero</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="card text-white bg-secondary mb-3 mr-3 border-dark shadow-lg rounded">
                <div class="card-header">CÍRCULOS</div>
                <div class="card-body">
                    <h2 class="card-title"></h2>
                    <h3>{{ number_format($circulos, 0, ',', '.') }}</h3>
                </div>
            </div>            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="card text-white bg-success mb-3 mr-3 border-dark shadow-lg rounded">
                <div class="card-header">PARTICIPANTES</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h3>{{ number_format($participantes, 0, ',', '.') }}</h3>
                </div>
            </div>            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="card text-white bg-warning text-dark mb-3 mr-3 border-dark shadow-lg rounded">
                <div class="card-header">EDAD PROMEDIO </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h3>{{ number_format($promedio, 0, ',', '.') }}</h3>
                </div>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="card text-white bg-danger mb-3 mr-3 border-dark shadow-lg rounded">
                <div class="card-header">FEMENINO</div>
                <div class="card-body">
                    <h3>Total Femenino: {{ number_format($promedio_sexo->cant_fem, 0, ',', '.') }}</h3>
                    <h3>Promedio Edad Femenino: {{ number_format($promedio_sexo->prom_fem, 0, ',', '.') }}</h3>
                </div>
            </div>            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="card text-white bg-primary mb-3 mr-3 border-dark shadow-lg rounded">
                <div class="card-header">MASCULINO</div>
                <div class="card-body">
                    <h3>Total Masculino: {{ number_format($promedio_sexo->cant_masc, 0, ',', '.') }}</h3>
                    <h3>Promedio Edad Masculino: {{ number_format($promedio_sexo->prom_masc, 0, ',', '.') }}</h3>
                </div>
            </div>            
        </div>
    </div>
    @if ($ambito == 2)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <table 
                        id="top_cir_est" 
                        class="table table-hover" 
                        data-toolbar="#toolbar"
                        data-toggle="table" 
                        data-url="{{route('top_cir_est')}}" 
                        data-show-export="true" 
                        data-export-data-type="all" 
                        data-export-types="['csv', 'json', 'excel']" 
                        data-show-fullscreen="true" 
                        data-show-print="true" 
                        data-locale="es-VE"
                        data-search-accent-neutralise="true"
                        data-show-refresh="true"
                    >
                        <thead>
                            <tr>
                                <th colspan="2">10 PRINCIPALES ESTADOS CÍRCULOS</th>
                            </tr>
                            <tr>
                                <th data-field="estado" data-sortable="true">ESTADO</th>
                                <th data-field="count" data-sortable="true" >CIRCULOS</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-xl-7" style="margin: 0 auto;">
                <div class="card-body">
                    <div id="grf-est_cir" dir="ltr" style="display:flex;justify-content:center;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <table 
                    id="top_cir_est" 
                    class="table table-hover" 
                    data-toolbar="#toolbar"
                    data-toggle="table" 
                    data-url="{{route('top_part_est')}}" 
                    data-show-export="true" 
                    data-export-data-type="all" 
                    data-export-types="['csv', 'json', 'excel']" 
                    data-show-fullscreen="true" 
                    data-show-print="true" 
                    data-locale="es-VE"
                    data-search-accent-neutralise="true"
                    data-show-refresh="true"
                >
                    <thead>
                        <tr>
                            <th colspan="2">10 PRINCIPALES ESTADOS PARTICIPANTES</th>
                        </tr>
                        <tr>
                            <th data-field="estado" data-sortable="true">ESTADO</th>
                            <th data-field="cantidad_participantes" data-sortable="true" >PARTICIPANTES</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-xl-7" style="margin: 0 auto;">
                <div class="card-body">
                    <div id="grf-est_par" dir="ltr" style="display:flex;justify-content:center;">
                    </div>
                </div>
            </div>              
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <table 
                    id="cir_est" 
                    class="table table-hover" 
                    data-toolbar="#toolbar"
                    data-toggle="table" 
                    data-url="{{route('cir_est')}}" 
                    data-show-export="true" 
                    data-export-data-type="all" 
                    data-export-types="['csv', 'json', 'excel']" 
                    data-show-fullscreen="true" 
                    data-show-print="true" 
                    data-locale="es-VE"
                    data-search-accent-neutralise="true"
                    data-show-refresh="true"
                >
                    <thead>
                        <tr>
                            <th colspan="2">CÍRCULOS POR ESTADO</th>
                        </tr>
                        <tr>
                            <th data-field="estado" data-sortable="true">ESTADO</th>
                            <th data-field="count" data-sortable="true" >CIRCULOS</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-xl-7" style="margin: 0 auto;">
                <div class="card-body">
                    <div id="grf-test_cir" dir="ltr" style="display:flex;justify-content:center;">
                    </div>
                </div>
            </div>              
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <table 
                    id="par_est" 
                    class="table table-hover" 
                    data-toolbar="#toolbar"
                    data-toggle="table" 
                    data-url="{{route('part_est')}}" 
                    data-show-export="true" 
                    data-export-data-type="all" 
                    data-export-types="['csv', 'json', 'excel']" 
                    data-show-fullscreen="true" 
                    data-show-print="true" 
                    data-locale="es-VE"
                    data-search-accent-neutralise="true"
                    data-show-refresh="true"
                >
                    <thead>
                        <tr>
                            <th colspan="2">PARTICIPANTES POR ESTADO</th>
                        </tr>
                        <tr>
                            <th data-field="estado" data-sortable="true">ESTADO</th>
                            <th data-field="cantidad_participantes" data-sortable="true" >PARTICIPANTES</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-xl-7" style="margin: 0 auto;">
                <div class="card-body">
                    <div id="grf-test_part" dir="ltr" style="display:flex;justify-content:center;">
                    </div>
                </div>
            </div>              
        </div>
    @else
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <table 
                        id="cir_mun" 
                        class="table table-hover" 
                        data-toolbar="#toolbar"
                        data-toggle="table" 
                        data-url="{{route('cir_mun')}}" 
                        data-show-export="true" 
                        data-export-data-type="all" 
                        data-export-types="['csv', 'json', 'excel']" 
                        data-show-fullscreen="true" 
                        data-show-print="true" 
                        data-locale="es-VE"
                        data-search-accent-neutralise="true"
                        data-show-refresh="true"
                    >
                        <thead>
                            <tr>
                                <th colspan="2">CÍRCULOS POR MUNICIPIO</th>
                            </tr>
                            <tr>
                                <th data-field="municipio" data-sortable="true">MUNICIPIO</th>
                                <th data-field="count" data-sortable="true" >CIRCULOS</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-xl-7" style="margin: 0 auto;">
                <div class="card-body">
                    <div id="grf-mun_cir" dir="ltr" style="display:flex;justify-content:center;">
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5">
                <table 
                    id="cir_mun" 
                    class="table table-hover" 
                    data-toolbar="#toolbar"
                    data-toggle="table" 
                    data-url="{{route('part_mun')}}" 
                    data-show-export="true" 
                    data-export-data-type="all" 
                    data-export-types="['csv', 'json', 'excel']" 
                    data-show-fullscreen="true" 
                    data-show-print="true" 
                    data-locale="es-VE"
                    data-search-accent-neutralise="true"
                    data-show-refresh="true"
                >
                    <thead>
                        <tr>
                            <th colspan="2">PARTICIPANTES POR MUNICIPIO</th>
                        </tr>
                        <tr>
                            <th data-field="municipio" data-sortable="true">MUNICIPIO</th>
                            <th data-field="cantidad_participantes" data-sortable="true" >PARTICIPANTES</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-xl-7" style="margin: 0 auto;">
                <div class="card-body">
                    <div id="grf-mun_par" dir="ltr" style="display:flex;justify-content:center;">
                    </div>
                </div>
            </div>              
        </div>           
    @endif
@stop

@section('css')
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-table-group-by.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/choices.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@toast-ui/chart/dist/toastui-chart.min.css">
@stop
@section('js')
    <script src="{{ asset('/assets/js/jquery-3.5.1.js') }}"></script>
    
    <script src="{{ asset('/assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jspdf.plugin.autotable.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/multiple-sort/bootstrap-table-multiple-sort.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/print/bootstrap-table-print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/sticky-header/bootstrap-table-sticky-header.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/bootstrap-table-locale-all.min.js"></script>    
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/export/bootstrap-table-export.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/export/tableExport.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/export/xlsx.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table-group-by.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@toast-ui/chart"></script>
    <script>
        var ambito = @json($ambito);
        @if($ambito ==2)
            var top_cir_est = @json($top_cir_est);
            var el = document.getElementById('grf-est_cir');
            var series = [];
            top_cir_est.forEach(function(item) {
                series.push({
                    name: item.estado,
                    data: [parseInt(item.count)],
                    dataLabels: {
                        visible: true,
                        formatter: function(value, category, series) {
                            return series.name + ': ' + value;
                        }
                    }
                });
            });
            var data = {
                categories: ['Cantidad'],
                series: series,
            };
            var theme = {
                series: {
                    dataLabels: {
                        fontSize: 13,
                        fontWeight: 500,
                        color: '#000',
                        textBubble: { visible: true, arrow: { visible: true } },
                    },
                },
                exportMenu: {
                    button: {
                        backgroundColor: '#000000',
                        borderRadius: 5,
                        borderWidth: 2,
                        borderColor: '#000000',
                        xIcon: {
                            color: '#ffffff',
                            lineWidth: 3,
                        },
                        dotIcon: {
                            color: '#ffffff',
                            width: 10,
                            height: 3,
                            gap: 1,
                        },
                    },
                },
            };
            var nomarch = obtenerFechaHoraActual()+"_top_10_estados_circulos "
            // var nomarch = "top_10_estados_circulos"
            var options = {
                chart: { title: '10 Estados con mayor cantidad de círculos', width: 500, height: 600 },
                series: {
                selectable: true,
                dataLabels: {
                    visible: true,
                },
                },
                xAxis: {
                    title: 'Estado',
                },
                yAxis: {
                    title: 'Cantidads',
                },
                tooltip: {
                    grouped: true,
                },
                legend: {
                    align: 'bottom',
                },
                exportMenu: {
                    filename: nomarch
                },
                theme,
            };
            var chart3 = toastui.Chart.barChart({ el, data, options });
            // GRÁFICO TOP TEN CIRUCLOS x ESTADOS
            // GRÁFICO TOP TEN PARTICIPANTES x ESTADOS
            var top_part_est = @json($top_part_est);
            var el = document.getElementById('grf-est_par');
            var series = [];
            top_part_est.forEach(function(item) {
                series.push({
                    name: item.estado,
                    data: [parseInt(item.cantidad_participantes)],
                    dataLabels: {
                        visible: true,
                        formatter: function(value, category, series) {
                            return series.name + ': ' + value;
                        }
                    }
                });
            });
            var data = {
                categories: ['Cantidad'],
                series: series,
            };
            var theme = {
                series: {
                    dataLabels: {
                        fontSize: 13,
                        fontWeight: 500,
                        color: '#000',
                        textBubble: { visible: true, arrow: { visible: true } },
                    },
                },
                exportMenu: {
                    button: {
                        backgroundColor: '#000000',
                        borderRadius: 5,
                        borderWidth: 2,
                        borderColor: '#000000',
                        xIcon: {
                            color: '#ffffff',
                            lineWidth: 3,
                        },
                        dotIcon: {
                            color: '#ffffff',
                            width: 10,
                            height: 3,
                            gap: 1,
                        },
                    },
                },
            };
            var nomarch = obtenerFechaHoraActual()+"_top_10_estados_participantes "
            var options = {
                chart: { title: '10 Estados con mayor cantidad de participantes', width: 500, height: 600 },
                series: {
                selectable: true,
                dataLabels: {
                    visible: true,
                },
                },
                xAxis: {
                    title: 'Estado',
                },
                yAxis: {
                    title: 'Cantidads',
                },
                tooltip: {
                    grouped: true,
                },
                legend: {
                    align: 'bottom',
                },
                exportMenu: {
                    filename: nomarch
                },
                theme,
            };
            var chart4 = toastui.Chart.barChart({ el, data, options });        
            // GRÁFICO TOP TEN PARTICIPANTES x ESTADOS
            // GRÁFICO CIRCULOS x ESTADOS
            var cir_est = @json($cir_est);
            var el = document.getElementById('grf-test_cir');
            var series = [];
            cir_est.forEach(function(item) {
                series.push({
                    name: item.estado,
                    data: [parseInt(item.count)],
                    dataLabels: {
                        visible: true,
                        formatter: function(value, category, series) {
                            return series.name + ': ' + value;
                        }
                    }
                });
            });
            var data = {
                categories: ['Cantidad'],
                series: series,
            };
            var theme = {
                series: {
                    dataLabels: {
                        fontSize: 13,
                        fontWeight: 500,
                        color: '#000',
                        textBubble: { visible: true, arrow: { visible: true } },
                    },
                },
                exportMenu: {
                    button: {
                        backgroundColor: '#000000',
                        borderRadius: 5,
                        borderWidth: 2,
                        borderColor: '#000000',
                        xIcon: {
                            color: '#ffffff',
                            lineWidth: 3,
                        },
                        dotIcon: {
                            color: '#ffffff',
                            width: 10,
                            height: 3,
                            gap: 1,
                        },
                    },
                },
            };
            var nomarch = obtenerFechaHoraActual()+"_estados_circulos "
            var options = {
                chart: { title: 'Círculos por estado', width: 500, height: 1000 },
                series: {
                selectable: true,
                dataLabels: {
                    visible: true,
                },
                },
                xAxis: {
                    title: 'Estado',
                },
                yAxis: {
                    title: 'Cantidads',
                },
                tooltip: {
                    grouped: true,
                },
                legend: {
                    align: 'bottom',
                },
                exportMenu: {
                    filename: nomarch
                },
                theme,
            };
            var chart5 = toastui.Chart.barChart({ el, data, options });        
            // GRÁFICO CIRCULOS x ESTADOS
            // GRÁFICO PARTICIPANTES x ESTADOS
            var part_est = @json($part_est);
            var el = document.getElementById('grf-test_part');
            var series = [];
            part_est.forEach(function(item) {
                series.push({
                    name: item.estado,
                    data: [parseInt(item.cantidad_participantes)],
                    dataLabels: {
                        visible: true,
                        formatter: function(value, category, series) {
                            return series.name + ': ' + value;
                        }
                    }
                });
            });
            var data = {
                categories: ['Cantidad'],
                series: series,
            };
            var theme = {
                series: {
                    dataLabels: {
                        fontSize: 13,
                        fontWeight: 500,
                        color: '#000',
                        textBubble: { visible: true, arrow: { visible: true } },
                    },
                },
                exportMenu: {
                    button: {
                        backgroundColor: '#000000',
                        borderRadius: 5,
                        borderWidth: 2,
                        borderColor: '#000000',
                        xIcon: {
                            color: '#ffffff',
                            lineWidth: 3,
                        },
                        dotIcon: {
                            color: '#ffffff',
                            width: 10,
                            height: 3,
                            gap: 1,
                        },
                    },
                },
            };
            var nomarch = obtenerFechaHoraActual()+"_estados_participantes "
            var options = {
                chart: { title: 'Participantes por estado', width: 500, height: 1000 },
                series: {
                selectable: true,
                dataLabels: {
                    visible: true,
                },
                },
                xAxis: {
                    title: 'Estado',
                },
                yAxis: {
                    title: 'Cantidads',
                },
                tooltip: {
                    grouped: true,
                },
                legend: {
                    align: 'bottom',
                },
                exportMenu: {
                    filename: nomarch
                },
                theme,
            };
            var chart6 = toastui.Chart.barChart({ el, data, options });
            // GRÁFICO PARTICIPANTES x ESTADOS
    @else
        ///////////CIRCULOS POR MUNICIPIO
        var top_cir_mun = @json($top_cir_mun);
            var el = document.getElementById('grf-mun_cir');
            var series = [];
            top_cir_mun.forEach(function(item) {
                series.push({
                    name: item.municipio,
                    data: [parseInt(item.count)],
                    dataLabels: {
                        visible: true,
                        formatter: function(value, category, series) {
                            return series.name + ': ' + value;
                        }
                    }
                });
            });
            var data = {
                categories: ['Cantidad'],
                series: series,
            };
            var theme = {
                series: {
                    dataLabels: {
                        fontSize: 13,
                        fontWeight: 500,
                        color: '#000',
                        textBubble: { visible: true, arrow: { visible: true } },
                    },
                },
                exportMenu: {
                    button: {
                        backgroundColor: '#000000',
                        borderRadius: 5,
                        borderWidth: 2,
                        borderColor: '#000000',
                        xIcon: {
                            color: '#ffffff',
                            lineWidth: 3,
                        },
                        dotIcon: {
                            color: '#ffffff',
                            width: 10,
                            height: 3,
                            gap: 1,
                        },
                    },
                },
            };
            var nomarch = obtenerFechaHoraActual()+"_municipios_circulos "
            var options = {
                chart: { title: 'Círculos por municipio', width: 500, height: 600 },
                series: {
                    selectable: true,
                    dataLabels: {
                        visible: true,
                    },
                },
                xAxis: {
                    title: 'Municipio',
                },
                yAxis: {
                    title: 'Cantidads',
                },
                tooltip: {
                    grouped: true,
                },
                legend: {
                    align: 'bottom',
                },
                exportMenu: {
                    filename: nomarch
                },
                theme,
            };
            var chart7 = toastui.Chart.barChart({ el, data, options });
            ///////////PARTICIPANTES POR MUNICIPIO
            var part_mun = @json($part_mun);
                var el = document.getElementById('grf-mun_par');
                var series = [];
                part_mun.forEach(function(item) {
                    series.push({
                        name: item.municipio,
                        data: [parseInt(item.cantidad_participantes)],
                        dataLabels: {
                            visible: true,
                            formatter: function(value, category, series) {
                                return series.name + ': ' + value;
                            }
                        }
                    });
                });
                var data = {
                    categories: ['Cantidad'],
                    series: series,
                };
                var theme = {
                    series: {
                        dataLabels: {
                            fontSize: 13,
                            fontWeight: 500,
                            color: '#000',
                            textBubble: { visible: true, arrow: { visible: true } },
                        },
                    },
                    exportMenu: {
                        button: {
                            backgroundColor: '#000000',
                            borderRadius: 5,
                            borderWidth: 2,
                            borderColor: '#000000',
                            xIcon: {
                                color: '#ffffff',
                                lineWidth: 3,
                            },
                            dotIcon: {
                                color: '#ffffff',
                                width: 10,
                                height: 3,
                                gap: 1,
                            },
                        },
                    },
                };
                var nomarch = obtenerFechaHoraActual()+"_municipios_participantes "
                var options = {
                    chart: { title: 'Participantes por municipio', width: 500, height: 1000 },
                    series: {
                    selectable: true,
                    dataLabels: {
                        visible: true,
                    },
                    },
                    xAxis: {
                        title: 'Municipios',
                    },
                    yAxis: {
                        title: 'Cantidades',
                    },
                    tooltip: {
                        grouped: true,
                    },
                    legend: {
                        align: 'bottom',
                    },
                    exportMenu: {
                        filename: nomarch
                    },
                    theme,
                };
                var chart8 = toastui.Chart.barChart({ el, data, options });

            ///////////PARTICIPANTES POR MUNICIPIO

    @endif
    function obtenerFechaHoraActual() {
        let fecha = new Date();
        let dia = String(fecha.getDate()).padStart(2, '0');
        let mes = String(fecha.getMonth() + 1).padStart(2, '0');
        let año = fecha.getFullYear();
        let horas = String(fecha.getHours()).padStart(2, '0');
        let minutos = String(fecha.getMinutes()).padStart(2, '0');
        let segundos = String(fecha.getSeconds()).padStart(2, '0');
        let fechaFormateada = año + '_' + mes + '_' + dia + '-' + horas + '_' + minutos + '_' + segundos;
        return fechaFormateada;
    }    
</script>
@stop