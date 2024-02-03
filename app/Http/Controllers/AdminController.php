<?php

namespace App\Http\Controllers;

use App\Models\departement;
use App\Models\Filiere;
use Carbon\Carbon;
use App\Models\User;
// Use Alert;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Etudiants = User::where('RoleID', 'etudiant')
        ->take(10)
        ->get();

        $TotalEtudiants = User::where('RoleID', 'etudiant')
        ->count();

        $TotalEnseignant = User::where('RoleID', 'prof')
        ->count();

        // $report = DB::select("select f.code, count(u.*) from filieres f users u
        // where u.filliere=f.id and u.RoleID='etudiant'
        // group by f.code
        // ");

        $numberEtuParFilliere= DB::select("
        SELECT f.code, COUNT(u.id) as user_count
        FROM filieres f
        JOIN users u ON u.filliere = f.id
        WHERE u.RoleID = 'etudiant'
        GROUP BY f.code
    ");

    // $numberEtuParFilliere = json_encode($numberEtuParFilliere);


        // dd($numberEtuParFilliere);

    //   foreach ($numberEtuParFilliere as $item) {
    //     dd($item->user_count, $item->code);

    //   }

        // dd($Etudiants);
        return view('admin.index', ['Etudiants'=>$Etudiants, 'TotalEtudiants'=>$TotalEtudiants, 
        'TotalEnseignant'=>$TotalEnseignant, 'numberEtuParFilliere'=>$numberEtuParFilliere]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('admin.usersProfile',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'Name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'user_name' => 'required|string',
            'address' => 'required|string',
        ];

    $request->validate($rules);

        // dd($request->imageAdmin);

        $user = User::find($id);
        // dd($request->file('imageAdmin'), $request);
        $user->name = $request->Name;
        $user->prenom = $request->prenom;
        $user->user_name = $request->user_name;
        $user->phone_number = $request->phone;
        $user->email = $request->email;
        $user->Address = $request->address;

        if (!empty($request->imageAdmin)) {
            $imagePath = $request->file('imageAdmin')->store('img', 'public');
            $user->image = $imagePath;
        }

        $user->save();
        Alert::success('Success', 'Mise a jour du profile effectue avec Succes');
        return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logoutAdmin(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginAdmin','admin');

    }
    
    public function ChangePassword(Request $request)
    {

// dd('test');

        $rules=[
           
            'currentPassword' => ['required', 'string', 'min:8'],
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
            
        ];

        $messages = [
            'currentPassword.required' => 'Le champ du mot de passe actuel est requis',
            'currentPassword.min' => 'Le mot de passe doit comporter au moins 8 caractères',
            'newPassword.required' => 'Le champ du nouveau mot de passe est requis',
            'newPassword.min' => 'Le mot de passe doit comporter au moins 8 caractères',
            'newPassword.confirmed' => 'La confirmation du mot de passe ne correspond pas',
        ];
        
        $clean = $request->validate($rules, $messages);
        
        $currentPassword =$request->currentPassword;
        $newPassword =$request->newPassword;
        // $confirmePassword =$request->confirmePassword;

        $admin = User::where('id', Auth::id())
        ->first();
        // dd($admin);

        if (Hash::check($currentPassword, $admin->password)) {
            $admin->password = Hash::make($newPassword);
            $admin->save();

            Alert::success('Success', 'Votre Password a ete change avec Succes');
            return redirect()->back();

        } else {
            Alert::success('Error', "Votre Password est incorrect");
            return redirect()->back();

        }

    }
// methodes Etudiants
    public function listeEtudiants()
    {
        $Etudiants = User::where('RoleID','etudiant')
        ->get();

        // dd($Etudiants);
        return view('admin.etudiants.etudiant', ['Etudiants'=>$Etudiants]);

    }
    
    public function ShowEtudiant($id)
    {
        $Etudiant = User::where('RoleID','etudiant')
        ->where('id',$id)
        ->get();
        // dd($Etudiant[0]->image);
        return view('admin.etudiants.showEtudiant',['Etudiant'=>$Etudiant]);

    }
    public function FormEtudiant()
    {
        $Filieres = Filiere::all();

        return view('admin.etudiants.Addetudiant', ['fillieres'=>$Filieres]);
    }

    public function addEtudiant(Request $request)
    {
        // dd($request);
        $rules = [
            'name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'user_name' => 'required|string|unique:users',
            'address' => 'required|string',
            'date_naissance' => 'required|date',
            'note_bac' => 'required|numeric|min:0|max:20',
            'note_diplome' => 'required|numeric|min:0|max:20',
            'filliere' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    $request->validate($rules);
    $Etudiant = new User();
    $Etudiant->name =$request->name;
    $Etudiant->Prenom =$request->prenom;
    $Etudiant->Address =$request->address;
    $Etudiant->email =$request->email;
    $Etudiant->password =Hash::make($request['password']);
    $Etudiant->phone_number =$request->telephone;
    $Etudiant->user_name =$request->user_name;
    $Etudiant->date_naissance =$request->date_naissance;
    $Etudiant->note_bac =$request->note_bac;
    $Etudiant->note_diplome =$request->note_diplome;
    $Etudiant->filliere =$request->filliere;
    $Etudiant->RoleID ='etudiant';
    // Téléchargez et stockez la nouvelle image
    $imagePath = $request->file('image')->store('img', 'public');
    $Etudiant->image = $imagePath;
    
    if ($Etudiant->save()) {

        Alert::success('Success', 'Etudiant ajoute avec Succes');
            return redirect()->back();
    } else {

        Alert::success('Error', "Probleme lorsque d'ajoute de l'etudiant");
            return redirect()->back();
    }
    

    }
    public function deleteEtudiants($id)
    {
        $Etudiant = User::find($id);
// dd('test');
        if ($Etudiant->delete()) {

            Alert::success('Success', 'Etudiant Supprime avec Succes');
            return redirect()->back();
        } else {
            Alert::success('Error', "Probleme lorsque de supprission de l'etudiant");
            return redirect()->back();
        }
    }
    // methodes Enseignats
    public function listeEnseignants()
    {
        $Enseignants = User::where('RoleID','prof')
        ->orderBy('created_at', 'desc')
        ->get();
        // dd($Enseignants);
        return view('admin.enseignants.enseignant', ['Enseignants'=>$Enseignants]);
    }

    public function ShowEnseignant($id)
    {
        // $Enseignant = User::where('RoleID','prof')
        // ->where('id',2)
        // ->get();
        $Enseignant = User::find($id);


        // $Enseignant = User::where('RoleID','prof')
        // ->where('id',$id)
        // ->get();

        // $Enseignant->courses();
        // dd($Enseignant->courses);
        return view('admin.enseignants.showEnseignant',['Enseignant'=>$Enseignant]);
    }
    public function FromEnseignant()
    {
        $Filieres = departement::all();
        // dd($Filieres);

        return view('admin.enseignants.Addenseignant', ['Filieres'=>$Filieres]);
    }

    public function addEnseignants(Request $request)
    {
        // dd($request->prenom);
        $rules = [
            'name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'user_name' => 'required|string|unique:users',
            'address' => 'required|string',
            'date_naissance' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

    $request->validate($rules);
    $Enseignant = new User();
    $Enseignant->name =$request->name;
    $Enseignant->Prenom =$request->prenom;
    $Enseignant->Address =$request->Address;
    $Enseignant->email =$request->email;
    $Enseignant->Departement =$request->deparetement_select;

    $Enseignant->phone_number =$request->telephone;
    $Enseignant->password =Hash::make($request['password']);
    $Enseignant->RoleID ='prof';
    $Enseignant->user_name =$request->user_name;
        // Téléchargez et stockez la nouvelle image
    $imagePath = $request->file('image')->store('img', 'public');
    $Enseignant->image = $imagePath;
    
    if ($Enseignant->save()) {

        Alert::success('Success', 'Professeur ajoute avec Succes');
            return redirect()->back();
    } else {

        Alert::success('Error', "Probleme lorsque d'ajoute de Professeur");
            return redirect()->back();
    }
    }
    public function deleteEnseignants($id)
    {
        $Enseignant = User::find($id);

        if ($Enseignant->delete()) {

            Alert::success('Success', 'Professeur Supprime avec Succes');
            return redirect()->back();
        } else {
            Alert::success('Error', 'Probleme lorsque de supprission de professeur');
            return redirect()->back();
        }

    }

    
    // methodes Salles
    public function listeSalles()
    {
        $Salles = Salle::all();
        return view('admin.salles.salle', ['Salles'=>$Salles]);
    }

    public function FormSalle()
    {
        return view('admin.salles.Addsalle');
    }


    public function addSalles(Request $request)
    {

    $Salle = new Salle();
    $Salle->nom =$request->nom;
    $Salle->capacite =$request->capacite;
    $Salle->description =$request->description;
    $Salle->disponibilite =$request->disponibilite;
    
    if ($Salle->save()) {

        Alert::success('Success', 'Salle ajoute avec Succes');
            return redirect()->back();
    } else {

        Alert::success('Error', "Probleme lorsque d'ajoute de la salle");
            return redirect()->back();
    }
    }
    public function deleteSalle($id)
    {
        $Salle = Salle::find($id);
        if ($Salle->delete()) {

            Alert::success('Success', 'Salle Supprime avec Succes');
            return redirect()->back();
        } else {
            Alert::success('Error', 'Probleme lorsque de supprission de la salle');
            return redirect()->back();
        }
    }
    public function inscription()
    {
        $Salles = Salle::all();
        return view('admin.salles.salle', ['Salles'=>$Salles]);
    }

    public function FormInscription()
    {
        $Filieres = Filiere::all();

        return view('admin.Inscription.inscriptionForm', ['fillieres'=>$Filieres]);
    }

    public function listInscription()
    {
        // $fillieres =[
        //     'TMW',
        //     'CLE'
        // ];
        // $Candidats = User::where('RoleID','candidat')
        // ->orderBy('created_at', 'desc')
        // ->get();

        // $Candidats =DB::select("select u.*, round((u.note_diplome + u.note_bac)/2,2) as moyenne from users u 
        // where u.RoleID = 'candidat' order by moyenne desc"); 

        $fillieres =DB::select("select f.* from filieres f"); 

        $Candidats = DB::table('users as u')
        ->select('u.*', DB::raw('round((u.note_diplome + u.note_bac)/2,2) as moyenne'))
        ->where('u.RoleID', '=', 'candidat')
        ->orderBy('moyenne', 'desc')
        ->paginate(5); // Adjust the number of items per page as needed

// dd($fillieres);
// dd($Candidats);
        return view('admin.Inscription.listinscription', ['Candidats'=>$Candidats, 'fillieres'=>$fillieres]);
    }

    public function listCandidateFilterAjax(Request $request)
    {
        $select_filliere = request('selected_filliere');

        $fillieres =DB::select("select f.* from filieres f"); 


        // $CandidatsFiltred =DB::select("select u.*, round((u.note_diplome + u.note_bac)/2,2) as moyenne from users u 
        // where u.RoleID = 'candidat' and u.filliere='{$select_filliere}' order by moyenne desc");
        if ($select_filliere =='0') {
            
            $CandidatsFiltred = DB::table('users as u')
            ->select('u.*', DB::raw('ROUND((u.note_diplome + u.note_bac) / 2, 2) as moyenne'))
            ->where('u.RoleID', '=', 'candidat')
            ->orderByDesc('moyenne')
            ->paginate(5); // Adjust the number of items per page as needed
        }else{

        $CandidatsFiltred = DB::table('users as u')
        ->select('u.*', DB::raw('ROUND((u.note_diplome + u.note_bac) / 2, 2) as moyenne'))
        ->where('u.RoleID', '=', 'candidat')
        ->where('u.filliere', '=', $select_filliere)
        ->orderByDesc('moyenne')
        ->paginate(5); // Adjust the number of items per page as needed

    }

    // return response($CandidatsFiltred);
        return view('admin.Inscription.listinscription', ['Candidats'=>$CandidatsFiltred, 'fillieres'=>$fillieres]);

    }

    public function ConvertCandidateToEtudiant(Request $request,)
    {

        $nbrSelectionne= $request->nbrSelectione;
        $filliere= $request->filliere;

        if ($filliere =='0') {
            Alert::error('Erreur', "Veuillez sélectionner la filière des candidats avant de valider.");
            return redirect()->back();
        }
        // dd($request);

        
        $filliereName =DB::select("select code from filieres f
        where id='{$filliere}'");
        // dd($filliereName[0]->code);
        $filliereName =$filliereName[0]->code;

        // dd($filliere);

        $totalCandidate =DB::select("select count(*) as total from users u 
        where u.RoleID = 'candidat' and filliere='{$filliere}'");

        // dd($totalCandidate[0]->total, $nbrSelectionne);


        if ($totalCandidate[0]->total < $nbrSelectionne) {
            
            Alert::error('Erreur', "Le nombre sélectionné, {$nbrSelectionne}, excède le nombre de candidats dans la filière {$filliereName}.");
            return redirect()->back();

        }

        // $Etudiant =DB::select("select u.*, round((u.note_diplome + u.note_bac)/2,2) as moyenne from users u 
        // where u.RoleID = 'candidat' order by moyenne desc 
        // LIMIT :nbrSelectionne", ['nbrSelectionne' => $nbrSelectionne]);

        // // dd($Etudiant[0]->name);
        // foreach ($Etudiant as $etd) {

        //     // echo '<pre>';
        //     // var_dump($etd);
        //     // echo '</pre>';
            
        //     $etd->RoleID='etudiant';
        //     $etd->save(); //erreur


        // }

            try {

                // Update the RoleID for selected candidates
                DB::table('users')
                    ->where('RoleID', 'candidat')
                    ->where('filliere', $filliere)
                    ->orderByRaw('(note_diplome + note_bac) / 2 DESC')
                    ->take($nbrSelectionne)
                    ->update(['RoleID' => 'etudiant']);

                // Display success message and redirect
                Alert::success('Success', "La sélection de {$nbrSelectionne} candidate en {$filliereName} a été effectuée avec succès.");
                return redirect()->back();

            } catch (\Exception $e) {
                // Display error message and redirect
                Alert::error('Error', "Problème lors de la sélection. Détails : {$e->getMessage()}");
                return redirect()->back();
            }

    }

    public function showCandidate($id)
    {
        $Candidat = User::where('RoleID','candidat')
        ->where('id',$id)
        ->get();
        // dd($Candidat);

        return view('admin.Etudiants.candidate', ['Candidat'=>$Candidat]);
    }

    public function destroyCandidate($id)
    {
        $Salle = User::find($id);
        if ($Salle->delete()) {

            Alert::success('Success', 'Candidate Supprime avec Succes');
            return redirect()->back();
        } else {
            Alert::success('Error', 'Probleme lorsque de supprission de la candidate');
            return redirect()->back();
        }
    }

    public function SendInscription(Request $request)
    {

        $rules = [
            'name' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|date',
            'email' => 'required|email',
            'tele' => 'required',
            'address' => 'required|string',
            'note_bac' => 'required|numeric',
            'note_diplome' => 'required|numeric',
            'genre' => 'required|in:h,f', // Valeurs autorisées: 'h' ou 'f'
            'num_identite' => 'required|numeric',
            'filliere' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];

    $request->validate($rules);
    // dd($request);
    $candidat = new User();
    $candidat->name =$request->name;
    $candidat->Prenom =$request->prenom;
    $candidat->Address =$request->address;
    $candidat->email =$request->email;
    $candidat->phone_number =$request->tele;
    $candidat->note_bac =$request->note_bac;
    $candidat->note_diplome =$request->note_diplome;
    $candidat->genre =$request->genre;
    $candidat->filliere =$request->filliere;
    $candidat->num_identite =$request->num_identite;

    // $candidat->password =Hash::make($request['password']);
    $candidat->RoleID ='candidat';
    $candidat->date_naissance= Carbon::parse($request->date_naissance);
    // Téléchargez et stockez la nouvelle image
    $imagePath = $request->file('image')->store('img', 'public');
    $candidat->image = $imagePath;
    
    if ($candidat->save()) {

        Alert::success('Success', 'Votre contidature a été ajouté avec succès');
            return redirect()->back();
    } else {

        Alert::success('Error', "Probleme lorsque d'ajoute du candidat");
            return redirect()->back();
    }


    }



    public function handelnscription(Request $request, $id)
    {
    $Salle = new Salle();
    $Salle->nom =$request->nom;
    $Salle->capacite =$request->capacite;
    $Salle->description =$request->description;
    $Salle->disponibilite =$request->disponibilite;
    
    if ($Salle->save()) {

        Alert::success('Success', 'Salle ajoute avec Succes');
            return redirect()->back();
    } else {

        Alert::success('Error', "Probleme lorsque d'ajoute de la salle");
            return redirect()->back();
    }
    }


       // methodes Filliere
       public function listeFilliere()
       {
        //    $Filiere = Filiere::all();
           $Filiere = Filiere::with('departement')->get();
        
        //    dd($Filiere);
           return view('admin.filliere.Fillieres', ['Filieres'=>$Filiere]);
       }
   
       public function FormFilliere()
       {

        $departements = departement::all();

           return view('admin.filliere.addFilliere', ['departements'=>$departements]);
       }
   
   
       public function addFilliere(Request $request)
       {
//    dd($request->deparetement);
       $Filiere = new Filiere();
       $Filiere->nom =$request->nom;
       $Filiere->code =$request->code;
       $Filiere->description =$request->description;
       $Filiere->Departement =$request->deparetement;
       
       if ($Filiere->save()) {
   
           Alert::success('Success', 'Filiere ajoute avec Succes');
               return redirect()->back();
       } else {
   
           Alert::success('Error', "Probleme lorsque d'ajoute de la Filiere");
               return redirect()->back();
       }
       }
       public function deleteFilliere($id)
       {
           $Filiere = Filiere::find($id);
           if ($Filiere->delete()) {
   
               Alert::success('Success', 'Filiere Supprime avec Succes');
               return redirect()->back();
           } else {
               Alert::success('Error', 'Probleme lorsque de supprission de la Filiere');
               return redirect()->back();
           }
       }


       //contact methode

       public function contact()
       {

           return view('admin.Contact.contact');
       }



              // methodes Filliere
              public function listeDepartement()
              {
               //    $Filiere = Filiere::all();
                  $Departement = departement::all();
               
               //    dd($Filiere);
                  return view('admin.departement.Departements', ['Departements'=>$Departement]);
              }
          
              public function FormDepartement()
              {
              
                  return view('admin.departement.addDepartement');
              }
          
          
              public function addDepartement(Request $request)
              {
        //   dd($request);
            $rules = [
                'nom' => 'required|string',
                'description' => 'required|string',
            ];

            $request->validate($rules);
              $Departement = new Departement();
              $Departement->nom_Departement =$request->nom;
              $Departement->description =$request->description;
              
              if ($Departement->save()) {
          
                  Alert::success('Success', 'Departement ajoute avec Succes');
                      return redirect()->back();
              } else {
          
                  Alert::success('Error', "Probleme lorsque d'ajoute de la departement");
                      return redirect()->back();
              }
              }
              public function deleteDepartement($id)
              {
                  $Departement = departement::find($id);
                  if ($Departement->delete()) {
                    
                      Alert::success('Success', 'Departement Supprime avec Succes');
                      return redirect()->back();
                  } else {
                      Alert::success('Error', 'Probleme lorsque de supprission de la Departement');
                      return redirect()->back();
                  }
              }
       
   


}

 