@extends('layouts.layoutAdmin')

@section('title', 'Accueil')

@section('content')



  <main id="main" class="main">

    <div class="pagetitle">
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
          <div class="row ">

  




            <!-- Recent Sales -->
            <div class="col-12 ">
              <div class="pt-0 mt-0">



                <div class="card-body ">
                  <div class="row m-0">
                    <div class="col-lg-12 grid-margin stretch-card m-0">
                      <div class="card">
                        <div class="card-body mt-0">
                          



                          <div class="d-flex flex-row justify-content-center">
                            {{-- <div class=" bg-danger">
                              <img style="width: 20%;" class=" m-0 p-0" src="{{ asset('assets/img/Salle/salle.png')}}" alt="" >

                            </div> --}}
                            <div class="p-2">
                              
                              <h1 class="card-title fs-3 text-decoration-underline">
      
                         
                                AJOUTE UN FILLIERE</h1></div>
                           

                            <div class="p-2"></div>
                          </div>




                          <form id="signupForm" method="POST" action="{{ route('admin.AddFilliere') }}">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                              <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Nom de la filliere</label>
                                <input id="name" class="form-control" name="nom" type="text" value="{{ old('nom') }}">
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                          

                            <div class="mb-3 col-lg-6">
                              <label for="Abreviation" class="form-label ">Abreviation</label>
                              <input id="Abreviation" class="form-control" name="code" type="text" value="{{ old('code') }}">
                              @error('code')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          </div>

                          <div class="form-group row">

                            <div class="mb-3 col-lg-6">
                              <label for="text" class="form-label">Description</label>
                              <input id="text" class="form-control" type="text" name="description" value="{{ old('description') }}">
                              @error('description')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3 col-lg-6">
                            <label for="image" class="form-label">Departement:</label>

                            <select class="form-select form-select-sm" name="deparetement" aria-label="Small select example">
                              <option selected disabled>Choisir le Departement</option>

                              @forelse ($departements as $deprt)
                              <option value="{{ $deprt->id }}">{{ $deprt->nom_Departement }}</option>
                              @empty
                              <option value="">Aucune departement</option>

                              @endforelse
                            </select>
                             @error('deparetement')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                      </div>

                         


                            <input class="btn btn-primary px-4" type="submit" value="Ajouter">
                          </form>
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
