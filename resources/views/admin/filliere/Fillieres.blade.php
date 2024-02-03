@extends('layouts.layoutAdmin')

@section('title', 'Accueil')

@section('content')



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>LISTE DES Fillieres</h1>
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



                <div class="card-body ">

                  <div class="row py-4">

                    <div class="col-md-6 "></div>

                    <div class="col-md-6">
                      <div class="d-flex flex-row-reverse">
                        <a href="{{route('admin.FormFilliere')}}"  class=" me-2 btn btn-primary me-0">Ajouter un nouveau filliere</a>
                        <div class="p-2"></div>
                        <div class="p-2"></div>
                      </div>
                    </div>

                  </div>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Abdriviation</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">Departement</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Filieres as $filliere)
                      <tr>
                        <th scope="row"><a href="#">#{{ $filliere->id }} </a></th>
            
                        <td><a href="#" class="text-center">{{ $filliere->nom }}</a></td>
                        <td class=""><a href="#" class="text-primary ">{{ $filliere->code }}</a></td>
                        <td><a href="#" class="text-primary">{{ $filliere->description }}</a></td>
                        {{-- <td><span class="badge bg-success">{{ $filliere->disponibilite }}</span></td> --}}
                        <td>
                          <a href="#" class="text-primary">{{ $filliere->departement->nom_Departement }}</a>

                        </td>
                      
                        <td>

                          <form method="POST" action="{{ route('admin.destroyFilliere',$filliere->id ) }}" id="{{$filliere->id}}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <a  href="#"  class="deleteFormEtudiant btn btn-light bg-danger w-100" style="color: white" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                              </svg>Delete
                            </a>
                        </form>
                          </td>
                      </tr>
                      @endforeach
                      {{-- <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr> --}}
                    </tbody>
                  </table>

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
// Ajouter un écouteur d'événements à chaque bouton de suppression
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
                                        console.log(formElement);

                formElement.submit();
                }
            });
        });
    });

</script>
@endsection
