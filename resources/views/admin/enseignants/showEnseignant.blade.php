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
          <div class="row">

  




            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto ">



                <div class="card-body ">
                  <h3 class="bold">Detail personnel</h3>

                    <!--===== TEAM_DETAILS STARTS=======-->
                <div class="team-details-sectionarea section-padding5">
                  <div class="container">
                      <div class="row ">
                        <div class="col-lg-5  m-0 p-0">
                          <div class="team-detailsimg m-0 p-0">
                              <img class="w-75 m-0 p-0" src="{{ $Enseignant->image ? asset('storage/' . $Enseignant->image) : asset('assets/img/Enseignant/enseignant.png')}}" alt="">
                          </div>
                        </div>
                        
                          <div class="col-lg-7 ">


                            <table class="table">
                              <thead>
                                <tr>

                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="col"> <span class="fs-6" >Nom:</span> <span class="fw-normal" >{{ $Enseignant->name }}</span> </th>
                                </tr>
                                <tr>
                                  <th scope="col"><span  class="fs-6">Prenom:</span> <span class="fw-normal" >{{ $Enseignant->Prenom }}</span></th>

                                </tr>
                                <tr>
                                  <th scope="col"><span class="fs-6">Email:</span><span class="fw-normal" >{{ $Enseignant->email }}</span></th>

                                </tr>
                                <tr>
                                    <th scope="col"><span class="fs-6">Telephone:</span> <span class="fw-normal" >{{ $Enseignant->phone_number }}</span></th>

                                </tr>
                                <tr>
                                  <th scope="col"><span class="fs-6">Departement:</span> <span class="fw-normal" >{{ $Enseignant->phone_number }}</span></th>

                              </tr>
                               
                              </tbody>
                            </table>

                          </div>
                      </div>
                  </div>
                </div>
                </div>
                <!-- Team Details End -->
                </section><!-- End Contact Section -->




                <section class="section dashboard mt-2">
                  <div class="row">
            
                    <!-- Left side columns -->
                    <div class="col-lg-12">
                      <div class="row">
            
              
            
            
            
            
                        <!-- Recent Sales -->
                        <div class="col-12 ">
                          <div class="card recent-sales overflow-auto ">
            
            
            
                            <div class="card-body ">
            
            
                                <!--===== TEAM_DETAILS STARTS=======-->
                            <div class="team-details-sectionarea section-padding5">
                              <div class="container">
                                  <div class="row align-items-center">

                                      <div class="col-lg-12">
                                        <h1 class="font-lora font-48 lineh-54 weight-600 color-29 mb-1  pt-2"> <i class="fas fa-book"></i> Modules Enseignés</h1>
                                        <hr>

                                        <table class="table table-borderless datatable">
                                          <thead>
        
                                            <tr>
                                              <th scope="col">ID </th>
                                              <th scope="col">Nom du module </th>
                                              <th scope="col">Description</th>
                                            </tr>

                                          </thead>
                                          <tbody>
                                            @foreach ($Enseignant->courses as $course)
                                            <tr>
                                              <td scope="row"><a href="#">#{{$course->id}} </a></td>
                                              <td><a href="#" class="text-primary">{{ $course->nom_du_cours }}</a></td>
                                              <td><a href="#" class="text-primary">{{ $course->description }}</a></td>
                            
                                            </tr>
                                            @endforeach
                      
                                          </tbody>
                                        </table>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            </div>
                            <!-- Team Details End -->
                            </section><!-- End Contact Section -->
                







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
{{-- <script>
// Ajouter un écouteur d'événements à chaque bouton de suppression
document.querySelectorAll('.deleteFormMember').forEach(function (button) {
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

</script> --}}
@endsection
