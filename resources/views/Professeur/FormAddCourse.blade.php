@extends('layouts.layoutProf')


@section('title', 'Accueil')

@section('content')

<main id="main" class="main mt-5">

    <div class="pagetitle">


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
                            <div class="p-2"></div>
                            <div class="p-2"><h1 class="card-title fs-3 text-decoration-underline fs-1">AJOUTE UN COURS</h1></div>
                            <div class="p-2"></div>
                          </div>

                          <form id="signupForm" method="POST" action="{{ route('prof.addCours') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <div class="mb-3 col-lg-6">
                                    <label for="name" class="form-label fs-4">Nom du cours</label>
                                    <input id="name" class="form-control" name="nom" type="text" value="{{ old('nom') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                          

                                <div class="mb-3 col-lg-6">
                                <label for="prenom" class="form-label fs-4">Description</label>
                                <input id="prenom" class="form-control" name="description" type="text" value="{{ old('description') }}">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>


                            <div class="form-group row">

                                <div class="mb-3 col-lg-6">
                                    <label for="image" class="form-label fs-4">Sélectionnez une image:</label>
                                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3 col-lg-6">
                                    <label for="image" class="form-label fs-4">Sélectionnez une fichier:</label>
                                    <input type="file" name="pdfFile" class="form-control" id="file">
                                    @error('pdfFile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            
                                 </div>

                            </div>
                          
                             <div class="form-group row">

                                <div class="col-lg-4">

                                </div>


                                <div class=" col-lg-2 offset-md-1">
                                    <input class="btn btn-primary" type="submit" value="Ajouter">
                                </div>

                                <div class="col-lg-4">
                                </div>

                            </div>
                       

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