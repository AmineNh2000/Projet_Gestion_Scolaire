<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('assets/assetsDashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assetsDashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assetsDashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assetsDashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('assets/assetsDashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  {{-- <link href="assets/assetsDashboard/assets/css/style.css" rel="stylesheet"> --}}
  <link href="{{ asset('assets/AssetsProf/css/style.css') }}" rel="stylesheet">


   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   @yield('styles')

</head>
<body>

<header class="header" style="height: 105px;">
   
   <section class="flex" >

      <a href="home.html" >
        <img style="width: 110px; height: 90px;" src="{{ asset('assets/img/Ens/195090.svg') }}" alt="">

      </a>

      {{-- <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form> --}}
      <img style="width: 390px; height: ;" src="{{ asset('assets/img/Ens/257740.svg') }}" alt="">

      <img class="pb-4" style="width: 100px; height: ; margin-buttom:20px" src="{{ asset('assets/img/Ens/ensRabat.jpg') }}" alt="">

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
        
        <img src="{{  Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/assetsDashboard/assets/img/messages-3.jpg')}}" alt="Profile" class="rounded-circle image">
        <h3 class="name">{{ Auth::user()->name}}</h3>
         <p class="role">Professeur</p>
         <a href="{{ route('prof.profile') }}" class="btn">profile</a>
         <div class="flex-btn">


            {{-- <a href="{{ route('logoutProf', 'prof') }}" class="option-btn">LogOut</a> --}}

            <a class="option-btn" href="{{ route('logoutProf') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                          <i class="bi bi-box-arrow-right"></i>
             {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logoutProf') }}" method="POST" class="d-none">
              @csrf
          </form>

            {{-- <a href="register.html" class="option-btn">register</a> --}}
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
    <img src="{{  Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/assetsDashboard/assets/img/messages-3.jpg')}}" alt="Profile" class="rounded-circle image">

      {{-- <img src="{{ asset('assets/AssetsProf/images/pic-1.jpg') }}" class="image" alt=""> --}}
      <h3 class="name">{{ Auth::user()->name}}</h3>
      <p class="role">Professeur</p>
      <a href="{{ route('prof.profile') }}" class="btn"> profile</a>
   </div>

   <nav class="navbar">
      <a href="{{ route('prof-Dashborad') }}" ><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.html" style="visibility: hidden;" ><i class="fas fa-question" ></i><span >about</span></a>
      <a href="{{ route('prof.prof-cours') }}"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="{{ route('prof.prof-emploisTemps') }}"><i class="fas fa-chalkboard-user"></i><span>Emplois du temps</span></a>
      <a href="{{ route('prof.contact') }}"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>

</div>

<section class="home-grid">



</section>


@yield('content')


{{-- <section class="courses">

 
</section> --}}


{{-- <footer class="footer">

   &copy; copyright @ 2022 by <span>ENS RABAT</span> | all rights reserved!

</footer> --}}

<!-- custom js file link  -->
{{-- <script src="js/script.js"></script> --}}

<script src="{{ asset('assets/AssetsProf/js/script.js') }}"></script>


<script src="{{ asset('assets/assetsDashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Template Main JS File -->

@include('sweetalert::alert')


   
</body>
</html>