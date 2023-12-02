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
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Pendapatan</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">


                <div class="card-body">
                  <h5 class="card-title">Jumlah Guru</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Siswa</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Materi</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <!-- Reports -->
            <div class="row">

              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Populer <span>/Guru Bimbel Terpopuler</span></h5>

                    <!-- Line Chart -->
                    <div id="reportsChart"></div>

                    <script>
                      document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                          series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                          }, {
                            name: 'Revenue',
                            data: [11, 32, 45, 32, 34, 52, 41]
                          }, {
                            name: 'Customers',
                            data: [15, 11, 32, 18, 9, 24, 11]
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
                          colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            type: 'datetime',
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                          },
                          tooltip: {
                            x: {
                              format: 'dd/MM/yy HH:mm'
                            },
                          }
                        }).render();
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
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                  <h5 class="card-title">Kelas Terpopuler </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Guru</th>
                        <th scope="col">Rating</th>
                        {{-- <th scope="col">Status</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a >1</a></th>
                        <td>Matematika</td>
                        <td><a >Huang Renjun</a></td>
                        <td>⭐⭐⭐⭐⭐</td>
                        {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                      </tr>
                      <tr>
                        <th scope="row"><a >2</a></th>
                        <td>Bahasa Inggris</td>
                        <td><a >Lin Qiunan</a></td>
                        <td>⭐⭐⭐⭐⭐</td>
                        {{-- <td><span class="badge bg-warning">Pending</span></td> --}}
                      </tr>
                      <tr>
                        <th scope="row"><a >3</a></th>
                        <td>Bahasa Indonesia</td>
                        <td><a >Susanti Putri</a></td>
                        <td>⭐⭐⭐⭐</td>
                        {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                      </tr>
                      <tr>
                        <th scope="row"><a >4</a></th>
                        <td>Matematika</td>
                        <td><a >Na Jaemin</a></td>
                        <td>⭐⭐⭐</td>
                        {{-- <td><span class="badge bg-danger">Rejected</span></td> --}}
                      </tr>
                      <tr>
                        <th scope="row"><a>5</a></th>
                        <td>IPA</td>
                        <td><a >Husain Putra</a></td>
                        <td>⭐⭐⭐</td>
                        {{-- <td><span class="badge bg-success">Approved</span></td> --}}
                      </tr>
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
