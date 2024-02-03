<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('layouts.layoutProf');
        $id = Auth::id();
        // $cours = cour::where('id_user',2);
        $cours = Cour::where('id_user', $id)->get();

        return view('professeur.home', ['cours'=>$cours]);


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
        //
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
        //
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

    public function FormCours()
    {
        return view('professeur.FormAddCourse');
    }

    public function addCours(Request $request)
    {

        $rules = [
            'nom' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdfFile' => 'required|mimes:pdf|max:10240', // Taille maximale de 10 Mo pour le fichier PDF
        ];

    $request->validate($rules);
    // dd($request->pdfFile);


    $cours = new cour();
    $cours->nom_du_cours =$request->nom;
    $cours->description =$request->description;
    // Téléchargez et stockez la nouvelle image
    $imagePath = $request->file('image')->store('img', 'public');
    $cours->image = $imagePath;

    // $filePath = $request->file('pdfFile')->store('file', 'public');

    $filePath = $request->file('pdfFile')->store('cours_pdfs', 'public');

    $cours->file = $filePath;

    $cours->id_user = Auth::id();
    // dd($filePath);


    if ($cours->save()) {

        Alert::success('Success', 'cours ajoute avec Succes');
            return redirect()->back();
    } else {

        Alert::success('Error', "Probleme lorsque d'ajoute de la cours");
            return redirect()->back();
    }
    }

    public function Profile()
    {
        $user = User::find(Auth::id());
        return view('professeur.userProfile', ['user'=>$user]);
    }

    public function emploisTemps()
    {
        //
        return view('professeur.Schedule');

    }
    public function contact()
    {
        //
        return view('professeur.contact');

    }

    public function cours()
    {
        //
        $id = Auth::id();
        // $cours = cour::where('id_user',2);
        $cours = Cour::where('id_user', $id)->get();

        // dd($cours);
        return view('professeur.courses', ['cours'=>$cours]);

    }
}
