@extends('layouts.base')

@section('title', 'REPORT')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <div id="container"></div>
                </div>
                <div class="col-sm-6">
                    <div id="pie"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- @push('scripts') --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    {{-- @endpush --}}
    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'GRAFIK PENGUNJUNG PASIEN'
            },
            subtitle: {
                text: 'SIKLINIK'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Values '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [ {!! $series!!} ]
        });

        Highcharts.chart('pie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: "Pasien Berdasarkan Jenis Kelamin tahun {{date('Y')}}"
            },
            credits: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Jenis Kelamin',
                colorByPoint: true,
                data: {!!$series_pie!!}
                }]
        });
    </script>

@endsection
