@extends('layouts.layoutAdmin')

@section('title', 'Accueil')

@section('content')



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>AJOUTE ETUDIANT</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li> --}}
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

  




            <!-- Recent Sales -->
            <div class="col-12 ">
              <div class="card recent-sales overflow-auto ">



                <div class="card-body ">
                  <h5 class="card-title">Detail personnel</span></h5>


                    <!--===== TEAM_DETAILS STARTS=======-->
                    <div class="team-details-sectionarea section-padding5">
                      <div class="container">
                          <div class="row ">
                              <div class="col-lg-6">
                                  <div class="team-detailsimg">
                                      <img class="w-100" src="{{ $Etudiant[0]->image ? asset('storage/' . $Etudiant[0]->image) : asset('assets/img/Etudiant/etudiant.png')}}" alt="">
                                  </div>
                              </div>
                              <div class="col-lg-6">

                                <table class="table">
                                  <thead>
                                    <tr>
    
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="col"> <span class="fs-6" >Nom:</span> <span class="fw-normal" >{{ $Etudiant[0]->name }}</span> </th>
                                    </tr>
                                    <tr>
                                      <th scope="col"><span  class="fs-6">Prenom:</span> <span class="fw-normal" >{{ $Etudiant[0]->Prenom }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">Email:</span><span class="fw-normal" >{{ $Etudiant[0]->email }}</span></th>

                                    </tr>
                                    <tr>
                                        <th scope="col"><span class="fs-6">Telephone:</span> <span class="fw-normal" >{{ $Etudiant[0]->phone_number }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">Adresse: </span><span class="fw-normal" >{{ $Etudiant[0]->Address }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">Date naissance:</span><span class="fw-normal" > {{ $Etudiant[0]->date_naissance }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">date inscription:</span><span class="fw-normal" > {{ $Etudiant[0]->created_at }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">Departement:</span><span class="fw-normal">{{ $Etudiant[0]->name }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">Fillier:</span><span class="fw-normal">{{ $Etudiant[0]->name }}</span></th>
    
                                    </tr>
                                    <tr>
                                      <th scope="col"><span class="fs-6">Classe:</span><span class="fw-normal">{{ $Etudiant[0]->name }}</span></th>
    
                                    </tr>
    
                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>

              </div>
            </div><!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">







        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection
