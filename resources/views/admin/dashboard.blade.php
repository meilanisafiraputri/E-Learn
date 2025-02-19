@extends('layouts.layoutAdmin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            {{-- <div class="row"> --}}

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Pendapatan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ number_format($pendapatan) }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-4">

                        <div class="card info-card customers-card">


                            <div class="card-body">
                                <h5 class="card-title">Jumlah Guru</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $jumlahpemateri }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <div class="col-xxl-3 col-md-4">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Siswa</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $jumlahsiswa }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    {{-- <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Materi</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="ps-3">
                  <h6>{{ $jumlahmateri  }}</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div> --}}

                    <!-- Reports -->
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Penghasilan <span>/Bulan</span></h5>

                                    <!-- Line Chart -->
                                    <div id="bulanChart"></div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            fetch('/get-monthly-income')
                                                .then(response => response.json())
                                                .then(data => {
                                                    const formattedData = data.data.map(item => {
                                                        const date = new Date(item.year, item.month - 1);
                                                        const monthName = date.toLocaleString('default', {
                                                            month: 'short'
                                                        });
                                                        return {
                                                            x: monthName,
                                                            y: parseInt(item.total_income)
                                                        };
                                                    });
                                    
                                                    new ApexCharts(document.querySelector("#bulanChart"), {
                                                        series: [{
                                                            name: 'Pendapatan',
                                                            data: formattedData,
                                                        }],
                                                        chart: {
                                                            height: 350,
                                                            type: 'area',
                                                            toolbar: {
                                                                show: false
                                                            },
                                                        },
                                                        markers: {
                                                            size: 4
                                                        },
                                                        colors: ['#ff771d'],
                                                        fill: {
                                                            type: "gradient",
                                                            gradient: {
                                                                shadeIntensity: 1,
                                                                opacityFrom: 0.3,
                                                                opacityTo: 0.4,
                                                                stops: [0, 90, 100]
                                                            }
                                                        },
                                                        dataLabels: {
                                                            enabled: false
                                                        },
                                                        stroke: {
                                                            curve: 'smooth',
                                                            width: 2
                                                        },
                                                        tooltip: {
                                                            x: {
                                                                format: 'dd/MM/yy HH:mm'
                                                            },
                                                        },
                                                        xaxis: {
                                                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                                        }
                                                    }).render();
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                });
                                        });
                                    </script>                                    
                                    <!-- End Line Chart -->

                                </div>

                            </div>



                        </div><!-- End Reports -->
                    </div>
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Penghasilan <span>/Tahun </span></h5>

                                    <!-- Line Chart -->
                                    <div id="tahunChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            fetch('/get-year-income')
                                                .then(response => response.json())
                                                .then(data => {
                                                    const formattedData = data.data.map(item => {
                                                        return {
                                                            x: item.year,
                                                            y: parseInt(item.total_income)
                                                        };
                                                    });

                                                    new ApexCharts(document.querySelector("#tahunChart"), {
                                                        series: [{
                                                            name: 'Pendapatan',
                                                            data: formattedData,
                                                        }],
                                                        chart: {
                                                            height: 350,
                                                            type: 'area',
                                                            toolbar: {
                                                                show: false
                                                            },
                                                        },
                                                        markers: {
                                                            size: 4
                                                        },
                                                        colors: ['#ff771d'],
                                                        fill: {
                                                            type: "gradient",
                                                            gradient: {
                                                                shadeIntensity: 1,
                                                                opacityFrom: 0.3,
                                                                opacityTo: 0.4,
                                                                stops: [0, 90, 100]
                                                            }
                                                        },
                                                        dataLabels: {
                                                            enabled: false
                                                        },
                                                        stroke: {
                                                            curve: 'smooth',
                                                            width: 2
                                                        },
                                                        xaxis: {
                                                            type: 'category' // Menggunakan kategori sebagai sumbu X
                                                        },
                                                        tooltip: {
                                                            x: {
                                                                format: 'dd/MM/yy HH:mm'
                                                            },
                                                        }
                                                    }).render();
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                });
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>



                        </div><!-- End Reports -->
                    </div>

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Meteri Terpopuler </h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Materi</th>
                                            <th scope="col">Kelas</th>
                                            <th scope="col">Guru</th>
                                            {{-- <th scope="col">Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topMateriOrders as $key => $item)
                                            <tr>
                                                <th scope="row"><a>{{ ++$key }}</a></th>
                                                <td>{{ $item->Materi->nama_materi }}</td>
                                                <td>{{ $item->Materi->mapel }}</td>
                                                <td><a>{{ $item->Materi->guru->user->name }}</a></td>
                                                {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                    <!-- Top Selling -->
                    <!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <!-- End Right side columns -->

            {{-- </div> --}}
        </section>

    </main><!-- End #main -->
@endsection
