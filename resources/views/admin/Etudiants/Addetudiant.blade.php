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
                            <div class="p-2"></div>
                            <div class="p-2"><h1 class="card-title fs-3 text-decoration-underline">AJOUTE UN ETUDIANT</h1></div>
                            <div class="p-2"></div>
                          </div>

                          <form id="signupForm" method="POST" action="{{ route('admin.AddEtudiant-post') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                              <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Nom</label>
                                <input id="name" class="form-control" name="name" type="text" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                          

                            <div class="mb-3 col-lg-6">
                              <label for="prenom" class="form-label ">Prénom</label>
                              <input id="prenom" class="form-control" name="prenom" type="text" value="{{ old('prenom') }}">
                              @error('prenom')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          </div>

                          <div class="form-group row">

                            <div class="mb-3 col-lg-6">
                              <label for="email" class="form-label">Email</label>
                              <input id="email" class="form-control" name="email" type="email" value="{{ old('email') }}">
                              @error('email')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3 col-lg-6">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" name="telephone" value="{{ old('telephone') }}">
                            @error('telephone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                          <div class="form-group row">

                            <div class="mb-3 col-lg-6">
                              <label for="password" class="form-label">Mot de passe</label>
                              <input id="password" class="form-control" name="password" type="password">
                              @error('password')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="mb-3 col-lg-6">
                            <label for="confirm_password" class="form-label">Confirmez le mot de passe</label>
                            <input id="confirm_password" class="form-control" name="password_confirmation" type="password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        </div>

                            <div class="form-group row">
                              <div class="mb-3 col-lg-6">
                                <label for="user_name" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}">
                                @error('user_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-6">
                              <label for="Address" class="form-label">Address</label>
                              <input type="Address" class="form-control" name="address" value="{{ old('address') }}">
                              @error('address')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                        </div>
                            <div class="form-group row">

                              <div class="mb-3 col-lg-6">
                                <label for="note_bac" class="form-label">Note baccalauréat</label>
                                <input type="number" class="form-control" name="note_bac" value="{{ old('note_bac') }}">
                                @error('note_bac')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-6">
                              <label for="note_diplome" class="form-label">Note du diplôme</label>
                              <input type="number" class="form-control" name="note_diplome" value="{{ old('note_diplome') }}">
                              @error('note_diplome')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          
                          
                            </div>

                            <div class="form-group row">

                              <div class="mb-3 col-lg-6">
                                <label for="image" class="form-label">Sélectionnez une photo:</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-lg-6">
                              <label for="date_naissance" class="form-label">Date de naissance</label>
                              <input type="date" class="form-control" name="date_naissance" value="{{ old('date_naissance') }}">
                              @error('date_naissance')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>


                          
                          <div class="form-group row">

                            <div class="mb-3 col-lg-6">
                              <label for="image" class="form-label">Sélectionnez la filliere:</label>

                              <select id="select_filliere" class="form-select form-select-sm" aria-label="Small select example" name="filliere">
                                <option value="0" disabled readonly selected>Choisi la filliere</option>
                                @forelse ( $fillieres as $filliere)
                                <option value="{{ $filliere->id }}" >{{ $filliere->code }}</option>
                                @empty
                                <option value="" disabled readonly selected>Aucune filliere</option>

                                @endforelse

                              </select>                              
                              @error('filliere')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3 col-lg-6">

                        </div>

                              </div>
                            {{-- <div class="mb-3">
                              <label for="ageSelect" class="form-label">Age</label>
                              <select class="form-select" name="age_select" id="ageSelect">
                                <option selected="" disabled="">Select your age</option>
                                <option>12-18</option>
                                <option>18-22</option>
                                <option>22-30</option>
                                <option>30-60</option>
                                <option>Above 60</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Gender</label>
                              <div>
                                <div class="form-check form-check-inline">
                                  <input type="radio" class="form-check-input" name="gender_radio" id="gender1">
                                  <label class="form-check-label" for="gender1">
                                    Male
                                  </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input type="radio" class="form-check-input" name="gender_radio" id="gender2">
                                  <label class="form-check-label" for="gender2">
                                    Female
                                  </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input type="radio" class="form-check-input" name="gender_radio" id="gender3">
                                  <label class="form-check-label" for="gender3">
                                    Other
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Skills</label>
                              <div>
                                <div class="form-check form-check-inline">
                                  <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                  <label class="form-check-label" for="checkInline1">
                                    Angular
                                  </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                  <label class="form-check-label" for="checkInline2">
                                    ReactJs
                                  </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                  <label class="form-check-label" for="checkInline3">
                                    VueJs
                                  </label>
                                </div>
                              </div>
                            </div> --}}


                            <input class="btn btn-primary" type="submit" value="Envoyer">
                          </form>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="col-lg-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Bootstrap MaxLength</h4>
                          <p class="text-muted mb-3">Read the <a href="https://github.com/mimo84/bootstrap-maxlength" target="_blank"> Official Bootstrap MaxLength Documentation </a>for a full list of instructions and other options.</p>
                          <div class="row mb-3">
                            <div class="col-lg-3">
                              <label for="defaultconfig" class="col-form-label">Default usage</label>
                            </div>
                            <div class="col-lg-8">
                              <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text" placeholder="Type Something..">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-3">
                              <label for="defaultconfig-2" class="col-form-label">Few options</label>
                            </div>
                            <div class="col-lg-8">
                              <input class="form-control" maxlength="20" name="defaultconfig-2" id="defaultconfig-2" type="text" placeholder="Type Something..">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-lg-3">
                              <label for="defaultconfig-3" class="col-form-label">All the options</label>
                            </div>
                            <div class="col-lg-8">
                              <input class="form-control" maxlength="10" name="defaultconfig-3" id="defaultconfig-3" type="text" placeholder="Type Something..">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-3">
                              <label for="defaultconfig-4" class="col-form-label">Text Area</label>
                            </div>
                            <div class="col-lg-8">
                              <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
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
