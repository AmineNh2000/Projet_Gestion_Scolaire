<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    {{-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css"> --}}

    {{-- <link rel="stylesheet" type="text/css" href="css/iofrm-style.css"> --}}
    <link href="{{ asset('assets/css/login/iofrm-style.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="css/login/iofrm-theme22.css"> --}}
    <link href="{{ asset('assets/css/login/iofrm-theme27.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    

</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top " >


<div class="row w-100 container-fluid">
    <nav class="navbar  ">
        <div class="container-fluid">
          <a class="navbar-brand">
            <img style="width: 105px; height: ;" src="{{ asset('assets/img/Ens/195090.svg') }}" alt="">

          </a>

          <div class="col-6 offset-md-3 offset-md-1">
            <img style="width: 350px; height: ;" src="{{ asset('assets/img/Ens/257740.svg') }}" alt="">
      
          </div>

          <div class="d-flex">
            <img style="width: 105px; height: ;" src="{{ asset('assets/img/Ens/195090.svg') }}" alt="">

          </div>
        </div>
      </nav>

</div>

    </header>


    {{-- <div class="col-2">
        <img style="width: 105px; height: 105px;" src="{{ asset('assets/img/Ens/195090.svg') }}" alt="">

    </div>

    <div class="col-6 offset-md-1">
      <img style="width: 350px; height: 350px;" src="{{ asset('assets/img/Ens/257740.svg') }}" alt="">

    </div>

    <div class="col-3 offset">
        <img style="width: 105px; height: 105px;" src="{{ asset('assets/img/Ens/195090.svg') }}" alt="">

    </div> --}}



    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    {{-- <img class="logo-size" src="images/logo-light.svg" alt=""> --}}
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic8.svg" alt="">
                </div>
            </div>
            {{-- action="{{ route('loginSubmit',$type) --}}
            <form method="POST"  action="{{ $type === 'prof' ? route('loginSubmitProf', $type) : ($type === 'etudiant' ? route('loginSubmitEtudiant', $type) : route('loginSubmitAdmin', $type)) }}">
                @csrf
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="form-icon">
                            <div class="icon-holde">

                                {{-- <img style="width: 55%; height: 55%;" src="{{ 
                                    $type == 'Professeur' ? asset('assets/img/login/professeurLogin.png') : 
                                    ($type == 'Etudiant' ? asset('assets/img/login/etudiantLogin.png') : 
                                    ($type == 'admin' ?: '' )) 
                                }}" alt=""> --}}
                                
                                <img style="width: 55%; height:55%" src="{{ asset('assets/img/login/'.$type.'Login.png') }}" alt=""></div>


                        </div>
                        <h3 class="form-title-center">
                            <div class="header-text mb-4">
                                <h2>Espace {{ $type }}</h2>
                            </div>
                        </h3>
                        <form>
                            <input id="email" type="email" placeholder="Adresse e-mail" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            {{-- <input class="form-control" type="text" name="username" placeholder="E-mail Address" required> --}}
                            <input id="password" type="password" placeholder="Mot de passe" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            {{-- <input class="form-control" type="password" name="password" placeholder="Password" required> --}}
                           
                            <div class="input-group d-flex justify-content-between">

                           
                                    <label for="formCheck" class="form-check-label text-secondary">
                                      
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                            <label class="form-check-label" for="remember">
                                                {{ __('Se souvenir de moi') }}
                                            </label>
                             
                                 </label>
        
                                <div class="forgot">
                                    <small>
            
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Mot de passe oublié ?') }}
                                                </a>
                                            @endif
                                  
                                    
                                    </small>
                                </div>
                            </div>
                     
                           
                            <div class="form-button mt-2">
                                <button id="submit" type="submit" class="ibtn ibtn-full">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>

            {{-- debut login --}}
 <!----------------------- Conteneur principal -------------------------->

 {{-- <div class="container d-flex justify-content-center align-items-center ">

    <!----------------------- Conteneur de Connexion pour les Professeurs -------------------------->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">

        <!--------------------------- Boîte de gauche ----------------------------->

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
            <div class="featured-image mb-3">
                <img src="assets/img/ENS_IMAGE.jpg" class="img-fluid rounded-3" style="width: 400px;">
            </div>
            <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p>
            <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Accédez à l'espace dédié aux {{ $type }}s de notre université.</small>
        </div> 

        <!------------------------- Boîte de droite ---------------------------->

        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Espace {{ $type }}</h2>
                    <p>Nous sommes ravis de vous accueillir à nouveau.</p>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Adresse e-mail"> 
                    <input id="email" type="email" placeholder="Adresse e-mail" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="input-group mb-1">
                     <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mot de passe"> -
                    <input id="password" type="password" placeholder="Mot de passe" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
               
                        <label for="formCheck" class="form-check-label text-secondary">
                          
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                 
                     </label>
                    </div>
                    <div class="forgot">
                        <small>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                      
                        
                        </small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Se Connecter</button>

                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png" style="width:20px" class="me-2"><small>Connexion avec Google</small></button>
                </div>
                <div class="row">
                    <small>Vous un probleme? <a href="#">cotactez administration </a></small>
                </div>
            </div>
        </div> 

    </div>


                        {{-- fin login --}}
{{-- 
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}


 

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
