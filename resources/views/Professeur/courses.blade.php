
@extends('layouts.layoutProf')


@section('title', 'Accueil')

@section('content')

<section class="courses">

   <div class="d-flex justify-content-between">
      <div class=" heading mt-4">
         Mes cours
      </div>
      <div class="p-2 "></div>
      <div class="p-2 heading">
         <a href="{{route('prof.FormCours')}}"  class=" me-2 btn btn-primary me-0">Ajouter un nouveau Cours</a>

      </div>
    </div>



   <div class="box-container">




   <div class="row">

      @forelse ($cours as $cour)

         <div class="col-md-4">
            <div class="box">
               <div class="tutor">
      
      
          
                     <div class=""><h3>Date de creation: <span>{{ $cour->created_at->format('m-d-Y') }}
                     </span></h3></div>
                 
               </div>
               <div class="thumb">
                  {{-- <img src="{{ asset('assets/AssetsProf/images/thumb-1.png') }}" alt=""> --}}
                  <img src="{{ asset('storage/' . $cour->image) }}" alt="">
      
                  {{-- <span>10 videos</span> --}}
               </div>
               <h3 class="title">{{ $cour->nom_du_cours }}</h3>
               <a href="{{ asset('storage/' . $cour->file) }}" target="_blank" class="inline-btn">Voir le cours</a>
            </div>
         </div>

         @empty
         <h3>Aucun cours trouvé</h3>

         @endforelse
   </div>


   {{-- <div class="more-btn">
      <a href="courses.html" class="inline-option-btn"><h3>Voir tous les cours</h3></a>
   </div> --}}

   </div>
{{-- 
   <div class="more-btn">
      <a href="courses.html" class="inline-option-btn">view all courses</a>
   </div> --}}

</section>


@endsection