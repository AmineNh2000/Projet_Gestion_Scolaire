<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="{{ asset('assets/inscription/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  


    <title>Forme d'inscription </title> 
</head>
<body style="display: block;">


<div class="row  mt-3" style="width:85%; margin:auto;"  >
<div class="col-12 ">
    <div class="d-flex justify-content-between mb-2 ">

  <img class=" rounded-1 m-0 p-0" style="width: 13%; height:16%"   src="{{ asset('assets/img/Ens/195090.svg')}}" alt="">




            {{-- <img src="http://127.0.0.1:8000/assets/assetsDashboard/assets/img/profile-img.jpg" alt="Profile" class="rounded"> --}}


      {{-- <div class="p-2 bg-danger w-100 position-relative ">

        <img class=" position-absolute top-0 start-50 rounded-1 m-0 p-0" style="width: 50%; height:78%"   src="{{ asset('assets/img/Ens/MinitreEducation.png')}}" alt="">

      </div> --}}
      <div style="display: flex; align-items: center; justify-content: center;">
        <img class="rounded-1 m-0 p-0" style="width: 50%; height:78%" src="{{ asset('assets/img/Ens/257740.svg')}}" alt="">
    </div>
    

          <img class=" rounded-1 m-0 p-0" style="width: 11%; height:15%"  src="{{ asset('assets/img/Ens/ens3.png')}}" alt="">


    </div>
  </div>
</div>

<div class="row mt-2 ">
  <div class="col-1">
    </div>
  <div class="col-10 mb-5">

    <div class=" m-2  p-0 ">
      <div class="row w-100 ">
        <div class="col-md-12  ms-2">
          <div class="">
            <div class="card-body shadow p-3 mb-5 bg-body rounded">

              <div class="col-md-12">
                <div class="d-flex justify-content-center">
                  <div class="p-2"></div>
                  <div class="">
                    <h4 class="card-title fw-bold fs-3">INSCRIPTION</h4>
                  </div>
                  <div class="p-2"></div>
                </div>
              <form class="forms-sample" method="POST" action="{{ route('admin.send-inscription') }}"enctype="multipart/form-data">
                @csrf
                @method("POST")
                <div class="row mb-3">
                  <div class="col">
                    <label>Nom:</label>
                    <input class="form-control" type="text" placeholder="Entrez votre nom" name="name" >
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Prenom:</label>
                    <input class="form-control" type="text" placeholder="Entrez votre prenom" name="prenom" >
                    @error('prenom')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label>Date de naissance:</label>
                    <input class="form-control" type="date" placeholder="Entrez votre date de naissance" name="date_naissance" >
                    @error('date_naissance')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Email:</label>
                    <input class="form-control" type="text" placeholder="Entrez votre email" name="email" >
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Telephone:</label>
                    <input class="form-control mb-4 mb-md-0" data-inputmask-alias="(+99) 9999-9999" name="tele">
                    @error('tele')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                  </div>
                  <div class="col-md-6">
                    <label>Adresse:</label>
                    <input class="form-control" type="text" placeholder="Entrez votre adresse" name="address" >
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label>Note de bacalaureat:</label>
                    <input class="form-control" type="number" placeholder="Entrez votre Note" name="note_bac" >
                    @error('note_bac')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    </div>
                  <div class="col-md-6">
                    <label>Note de diplome:</label>
                    <input class="form-control" type="number" placeholder="Entrez votre Note diplome" name="note_diplome">
                    @error('note_diplome')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>  
                <div class="row mb-3">
                  <div class="col-md-6">

                        <label>Genre</label>
                        <select class="form-control" name="genre">
                            <option disabled selected>Sélectionnez le genre</option>
                            <option value="h">Homme</option>
                            <option value="f">Femme</option>
                    
                        </select>
                    </div>
            
                  <div class="col-md-6">

                        <label>Numéro de pièce d'identité</label>
                        <input class="form-control" type="text" placeholder="Entrez le numéro de pièce d'identité" name="num_identite">
                        @error('num_identite')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="form-group">

                        <label for="image" class="form-label">Sélectionnez une photo:</label>
                        <input type="file" name="image" class="form-control" id="image" accept="image/*">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image" class="form-label">Sélectionnez une filliere:</label>

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
              </div>



                </div>

                <div class="row mb-1">

                  <div class="col-md-6">


                  </div>
                <div class="col-md-12">
                  <div class="d-flex justify-content-center">
                    <div class="p-2"></div>
                    <div class="">
                      <button class=" px-3 rounded btn btn-primary">
                        <span class=" fs-6">Envoyer</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                    </div>
                    <div class="p-2"></div>
                  </div>


                  <div class="col-md-4">
              </div>
          </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<div class="col-1">
  </div>
 
    

    {{-- <script src="script.js"></script> --}}
    <script src="{{ asset('assets/inscription/script.js') }}"></script>
    @include('sweetalert::alert')
</body>
</html>