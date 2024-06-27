document.addEventListener('DOMContentLoaded', function () {
    const dayLabels = JSON.parse(document.getElementById('dayLabels').textContent);
    const dayCounts = JSON.parse(document.getElementById('dayCounts').textContent);

    const monthLabels = JSON.parse(document.getElementById('monthLabels').textContent);
    const monthCounts = JSON.parse(document.getElementById('monthCounts').textContent);

    var optionsDay = {
        chart: {
            type: 'line',
            height: 350,
            toolbar: {
                show: false
            },
            background: '#12141c'
        },
        colors: ['#00E396'],
        series: [{
            name: 'Scans per Day',
            data: dayCounts
        }],
        xaxis: {
            categories: dayLabels,
            labels: {
                style: {
                    colors: '#FFFFFF'
                }
            },
            axisBorder: {
                show: true,
                color: '#FFFFFF'
            },
            axisTicks: {
                show: true,
                color: '#FFFFFF'
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#FFFFFF'
                }
            }
        },
        tooltip: {
            theme: 'dark'
        }
    };

    var chartDay = new ApexCharts(document.querySelector("#dayChart"), optionsDay);
    chartDay.render();

    var optionsMonth = {
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false
            },
            background: '#12141c'
        },
        colors: ['#00E396'],
        series: [{
            name: 'Scans per Month',
            data: monthCounts
        }],
        xaxis: {
            categories: monthLabels,
            labels: {
                style: {
                    colors: '#FFFFFF'
                }
            },
            axisBorder: {
                show: true,
                color: '#FFFFFF'
            },
            axisTicks: {
                show: true,
                color: '#FFFFFF'
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#FFFFFF'
                }
            }
        },
        tooltip: {
            theme: 'dark'
        }
    };

    var chartMonth = new ApexCharts(document.querySelector("#monthChart"), optionsMonth);
    chartMonth.render();

    toastr.options = {
        "positionClass": "toast-bottom-right", // Position de la notification
        "timeOut": "3000"
    };
    toastr.success('Graphiques chargés', 'Succès');
});
