{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

</x-app-layout> --}}

@extends('dashboard.layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="main-content-inner">
    <div class="row pb-3 pt-3">
        <div class="col-md-2 col-sm-2">
            <h4 style="margin-bottom: 0;">Overview</h4>
        </div>
        <div class="col-md-10 col-sm-10"> </div>
    </div>

    <!-- Dashboard Card Start -->
    <div class="row" data-aos="fade-up">
        <div class="col-lg-3 col-md-6">
            <div class="dashboard_card shadow">
                <h6>Total Profits</h6>
                <strong>$95,595</strong>
                <span>+ 3.55%</span>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="dashboard_card shadow">
                <h6>Total Users</h6>
                <strong>$95,595</strong>
                <span>+ 3.55%</span>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="dashboard_card shadow">
                <h6>New Users</h6>
                <strong>1,984</strong>
                <span class="text-danger"> - 9.89%</span>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="dashboard_card shadow">
                <h6>Total Memberships</h6>
                <strong>95,595</strong>
                <span>+ 3.55%</span>
            </div>
        </div>
    </div>
    <!-- Dashboard Card End -->

    <!-- Chart Start -->
    <div class="row pt-3 ">
        <div class="col-md-8 pb-5" data-aos="fade-up">
            <div class="chart shadow chart-container">
                <span>Membership Reports</span>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-md-4 " data-aos="fade-up">
            <div class="chart2 activeuser shadow">
                <span>Active Users</span>
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
            <div class="row chart activMembarship mt-4 shadow" data-aos="fade-up">
                <div class="membars-wrapper">
                    <div class="membar-left">
                        <div class="overview-total">
                            <span class="overview-num">60%</span>
                            <canvas id="chart-cicle" class="chart-canvas" width="123" height="121"
                                style="display: block;box-sizing: border-box;height: 121px;width: 123px;"></canvas>
                        </div>
                    </div>
                    <div class="membar-right">
                        <div class="members">
                            <h4>1,860</h4>
                            <strong> / 3k Target</strong>
                            <p>Orders in Period</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Membership Reports Chart
        const ctx = document.getElementById("myChart").getContext("2d");
        let delayed;
        var gradient = ctx.createLinearGradient(0, 0, 0, 50);
      
        gradient.addColorStop(1, "rgba(71,101,246, 0.2)");
        gradient.addColorStop(0, "rgba(71,101,246,1)");
      
        const labels = ["Jun 1", "Jun 2", "Jun 3", "Jun 4", "Jun 5", "Jun 6", "Jun 7"];
      
        const data = {
            labels: labels,
            datasets: [{
                label: "Incomes",
                fill: true,
                backgroundColor: gradient,
                borderColor: "#4765f6",
                pointBackgroundColor: "#fff",
                tension: 0.4,
                data: [2, 10, 5, 15, 20, 30, 50],
            }, ],
        };
      
        const config = {
            type: "line",
            data: data,
            options: {
                radius: 3,
                hitRadius: 30,
                hoverRadius: 8,
                animation: {
                    onComplete: () => {
                        delayed = true;
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === "data" && context.mode === "default" && !delayed) {
                            delay = context.dataIndex * 300 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                        position: "top",
                        align: "end",
                        labels: {
                            fontColor: "#fff",
                            fontSize: 12,
                            usePointStyle: true,
                            padding: 20,
                            boxWidth: 10,
                            usePointStyle: true,
                            pointStyle: "rectRounded",
                            pointRadius: 5,
                            pointBorderWidth: 2,
                        },
                    },
                },
            },
        };
      
        const myChart = new Chart(ctx, config);
      
        // Active User Chart
        var ctxx = document.getElementById("chart-bars").getContext("2d");
      
        new Chart(ctxx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Users",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#4765F6",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6,
                }, ],
            },
            options: {
                // responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: "index",
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: "#fff",
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 5,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: "normal",
                                lineHeight: 2,
                            },
                            color: "rgba(15, 45, 105, 1)",
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: "#fff",
                        },
                        ticks: {
                            display: true,
                            color: "rgba(15, 45, 105, .8)",
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                },
            },
        });
      
      
        // Active MembarShip Chart
        var ctxxx = document.getElementById("chart-cicle").getContext("2d");
      
        new Chart(ctxxx, {
            type: "doughnut",
            data: {
                labels: ["Active Membarship", "Inactive Membarship"],
                datasets: [{
                    label: "Users",
                    tension: 0.4,
                    borderWidth: 0,
                    borderSkipped: false,
                    backgroundColor: ["#fff", "#788ef9"],
                    data: [90, 50],
                    maxBarThickness: 5,
                }, ],
            },
            options: {
                //  
                maintainAspectRatio: false,
                cutout: 50,
                animation: {
                    duration: 2000,
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: "index",
                },
            },
        });
      </script>
@endsection