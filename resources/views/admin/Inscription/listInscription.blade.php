@extends('layouts.layoutAdmin')

@section('title', 'Accueil')

@section('content')



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>LISTE DES DES CANDIDATS EN INFORMATIQUE POUR L'ANNE </h1>
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



                <div class="card-body" id="containerAjax">
                  {{-- <h5 class="card-title">Recent Sales <span>| Today</span></h5> --}}
                  <form action="{{route('admin.ConvertCandidateToEtudiant')}}" method="get">

                  <div class="row py-4">

                    <div class="col-md-3 ">

                      <select id="select_filliere" class="form-select form-select-sm" aria-label="Small select example" name="filliere">
                        <option value="0" disabled readonly selected>Tous les fillieres</option>
                        @forelse ( $fillieres as $filliere)
                        <option value="{{ $filliere->id }}" >{{ $filliere->code }}</option>
                        @empty
                        <option value="0" disabled readonly selected>Aucune filliere</option>

                        @endforelse

                      </select>
                      
                      {{-- <select id="select_filliere" class="form-select form-select-sm" aria-label="Small select example" name="filliere">
                        <option value="0" disabled readonly selected>Tous les fillieres</option>

                        @foreach ( $fillieres as $filliere)
                        <option value="{{ $filliere->id }}" >{{ $filliere->code }}</option>

                        @endforeach

                      </select> --}}
                    </div>
                    <div class="col-md-3 ">

                    </div>


                    <div class="col-md-6">
                      <div class="d-flex flex-row-reverse ">
                    
                        {{-- <a href="#"  class=" p-1 btn btn-primary"> Validé</a> --}}
                        <button class=" p-1 btn btn-primary">Validé</button>&nbsp; &nbsp; &nbsp;

                        <span class="fs-6">premiere </span> &nbsp;<input class="form-control-sm" type="number" min="1" max="45" name="nbrSelectione"><span class="fs-6"> Sélectionnez les&nbsp; </span> 
                        {{-- <a href="{{route('admin.addEnseignant')}}"  class=" me-2 btn btn-primary me-0">Selectionner les t</a> --}}
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                      </div>

                    </div>

                  </div>
                </form>
              <div id="tableCandidate">
                  <table class="table table" >
                    <thead>
                      <tr>
                        <th scope="col" class="">ID</th>
                        <th scope="col" class="">Nom</th>
                        <th scope="col" class="">Prenom</th>
                        <th scope="col" class="">Email</th>
                        <th scope="col" class="">Telephone</th>
                        <th scope="col" class="">Moyenne calcule</th>
                        <th scope="col" class="" colspan="">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($Candidats as $Candidate)
                      <tr>
                        <th scope="row"><a href="#">#{{ $Candidate->id }} </a></th>
          
                        <td><a href="#" class="text-primary">{{ $Candidate->name }}</a></td>
                        <td><a href="#" class="text-primary">{{ $Candidate->Prenom }}</a></td>
                        <td><a href="#" class="text-primary">{{ $Candidate->email }}</a></td>
                        <td><span class=" w-100">{{ $Candidate->phone_number}}</span></td>
                        <td class="fs-6"  >{{ $Candidate->moyenne  }}</td>
                        <td>
                            
                          <div class="d-flex flex-row ">
                            <div class="me-1">
                              <a  href="{{ route('admin.showCandidate',$Candidate->id) }}"  class="btn btn-light bg-primary w-100" style="color: white" >
                                Voir
                                </a>
                            </div>
                            <div class="">
                              <form method="POST" action="{{ route('admin.destroyCandidate',$Candidate->id ) }}" id="{{$Candidate->id}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <a  href="#"  class="deleteFormEtudiant btn btn-light bg-danger w-100" style="color: white" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                  </svg>Delete
                                </a>
                            </form>
                            </div>
                          </div>
                          </td>
                      </tr>

                      @empty
                      <tr >
                        <td colspan="7" class="fs-5 bolder" >
                          <center>
                          Aucune enregistrement
                        </center>
                        </td>

                      </tr>

                      @endforelse
                    
                    </tbody>

                  </table>
                  {{ $Candidats->links() }}

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

@section('script')

<script>



  // test
$(document).ready(function() {
  
        $('#select_filliere').on('change', function(e) {

      var selected_filliere = $('#select_filliere').val();
      console.log(selected_filliere)

      $.ajax({
        type: 'GET',
        url: "{{ route('admin.listeCandidateAjax') }}",
        data: { selected_filliere: selected_filliere },
        success: function(data) {
          console.log(data);
          console.log("test");

          
        // Extract the specific content using jQuery
        var contentFiltred = $(data).find('#tableCandidate').html();
        // $('#containerAjax').html(contentFiltred);

          $('#tableCandidate').empty();
          console.log(contentFiltred);

          $('#tableCandidate').append(contentFiltred);
          
        }
      });
    });
    });

    //alert
document.querySelectorAll('.deleteFormEtudiant').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            var formElement = button.closest('form'); // Récupérer l'élément <form> parent

              Swal.fire({
    title: 'Êtes-vous sûr(e) ?',
    text: "Vous ne pourrez pas revenir en arrière !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, supprimez-le !',
    cancelButtonText: 'Annuler'

            }).then((result) => {
                if (result.isConfirmed) {
                    // Trouver le formulaire parent et le soumettre
                    console.log(button);
                    var enseignantId = button.id; // Récupérer l'ID du bouton de suppression
                    var enseignantElement = document.getElementById(enseignantId); // Récupérer l'élément avec l'ID


                                        // Soumettre le formulaire parent
                formElement.submit();
                }
            });
        });
    });


</script>

@endsection






