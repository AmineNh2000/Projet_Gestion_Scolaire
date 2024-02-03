@extends('layouts.layoutAdmin')

@section('title', 'Accueil')

@section('content')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Candidats</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card ">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center" >

              <img class=" rounded-circle" src="{{ $Candidat[0]->image ? asset('storage/' . $Candidat[0]->image) : asset('assets/img/Enseignant/enseignant.png')}}" alt="">

              {{-- <img src="{{ asset('assets/assetsDashboard/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle"> --}}

              {{-- <h2>{{ $Candidat->Candidat_name }}</h2> --}}
              {{-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> --}}
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->name }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Prenom:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->Prenom }}</div>
                  </div>

                  {{-- <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom d'utilisateur</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat->Candidat_name }}</div>
                  </div> --}}



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->Address }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->phone_number }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">E-mail:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Carte National:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->num_identite }}</div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date naissance:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->date_naissance }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date inscription:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->created_at }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Note baccalaureat:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->note_bac }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Note Diplome:</div>
                    <div class="col-lg-9 col-md-8">{{ $Candidat[0]->note_diplome }}</div>
                  </div>
                  
                </div>

 
                </div>

                



                <div class="tab-pane fade pt-3" id="profile-settings">


                </div>



              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <script>

    document.getElementById('BoutonChangePassword').addEventListener('click', function(event) {
            // Empêcher la soumission par défaut du formulaire
            event.preventDefault();

            // Vous pouvez ajouter ici des validations ou des actions supplémentaires avant la soumission du formulaire

            // Soumettre le formulaire programmatically
            document.getElementById('submitChangePassword').submit();
        });
  </script>
  @endsection