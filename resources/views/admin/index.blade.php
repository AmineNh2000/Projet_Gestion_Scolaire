@extends('layouts.layoutAdmin')

@section('title', 'Accueil')

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
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8 ">
          <div class="row ">

            <!-- Sales Card -->
            <div class="col-md-5 ">
              <a href="{{ route('listeEtudiants') }}">
              <div class="card info-card sales-card">


                <div class="card-body">
       
                  <h5 class="card-title fw-medium">Etudiants</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      {{-- <i class="bi bi-cart"></i> --}}
                      {{-- <i class="bi bi-person-fill"></i> --}}

                <i class="fas fa-user-graduate"></i>

                    </div>
                    <div class="ps-3">
                      <span class="fs-5 fw-bold">Total: </span><span class=" fs-5">{{ $TotalEnseignant }}</span>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>
            
              </div>

            </a>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            
            <div class=" col-md-5">
              <a href="{{ route('listeEnseignants') }}">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title fw-medium">Enseignants</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      {{-- <i class="bi bi-currency-dollar"></i> --}}
                      <i class="fas fa-chalkboard-teacher"></i>

                    </div>
                    <div class="ps-3">
                      <span class="fs-5 fw-bold">Total: </span><span class=" fs-5">{{ $TotalEtudiants }}</span>

                    </div>
                  </div>
                </div>

              </div>
            </a>
            </div><!-- End Revenue Card -->


            

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Les étudiants récemment enregistrés <span></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ( $Etudiants as $Etudiant)

                      <tr>
                        <th scope="row"><a href="#">#{{ $Etudiant->id }}</a></th>
                        <th scope="row"><a href="#">{{ $Etudiant->name }}</a></th>
                        <td>{{ $Etudiant->Prenom }}</td>
                        <td><a href="#" class="text-primary">{{ $Etudiant->Email }}</a></td>
                        <td> {{ $Etudiant->phone_number }} </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">




          <!-- Website Traffic -->
          <div class="card">
            {{-- <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div> --}}

            <div class="card-body pb-0">
              <h5 class="card-title">Nombre des Etudiant Par Filliere <span></span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {

                  var Datas = {!! json_encode($numberEtuParFilliere) !!};
                console.log(Datas);

                // console.log(Datas, "here!");

                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },


                      data: Datas.map(element => ({
                            value: element.user_count,
                            name: element.code
                          }))

                        // {
                        //     value: 'test',
                        //     name: 'tetft'
                        //   },

                      

                          // Datas.forEach(element => {

                          // {
                          //   value: element.user_count,
                          //   name: element.code
                          // },

                          // });

                          // for (const Datas of element) {
                          
                            
                          // {
                          //   value: element.user_count,
                          //   name: element.code
                          // }
                            
                          // }

                        // @foreach($numberEtuParFilliere as $item)
                        //   {
                        //     value: {{ $item->user_count }},
                        //     name: {{ $item->code }}
                        //   },
                        // @endforeach

                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->



        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection
