<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    //moi cree cette methode
    protected function redirectTo()
    {
        $currentUrl = URL::current();

// dd(auth()->user()->RoleID);

        if (str_contains($currentUrl, 'admin') && auth()->user()->RoleID=='admin') {
            return '/admin-Dashborad';
        }elseif (str_contains($currentUrl, 'prof') && auth()->user()->RoleID=='prof') {
            // return redirect('/admin-Dashborad');
            // return 'prof';
            return '/professeur';
        }elseif (str_contains($currentUrl, 'etudiant') && auth()->user()->RoleID=='etudiant') {
            // return redirect('/etudiant');
            return '/etudiant';
        }
        else {
            abort(403, "Vous avez pas le droit d'acceder");

            
        }
    }


    // LoginController.php

    public function loginSubmitProf(Request $request, $type)
    {
        $User =DB::select("select u.* from users u where u.email='{$request->email}'");

        $roleID =$User[0]->RoleID;

        if ( $type!='prof' || $roleID!='prof') {
            abort(403, "Vous avez pas le droit d'acceder");
        }

        // Traitement pour le type 'prof'
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // L'utilisateur est connecté
            // return 'prof';
            return redirect('/prof-Dashborad');

            // return redirect()->intended('/dashboard');
        }

        // Échec de l'authentification
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function loginSubmitEtudiant(Request $request, $type)
    {
        // $User = User::where('u.email', '=', $request->email);

        // $User = User::where('email',$request->email);
        
        // $User = DB::table('users as u')
        // ->select('u.*')
        // ->where('u.email', '=', $request->email);
        $User =DB::select("select u.* from users u where u.email='{$request->email}'");

        $roleID =$User[0]->RoleID;
        // dd($User[0]->RoleID);

        if ( $type!='etudiant' || $roleID!='etudiant') {
            abort(403, "Vous avez pas le droit d'acceder");
        }
        // Traitement pour le type 'etudiant'
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // L'utilisateur est connecté
            return '/etudiant';
            
            // return redirect()->intended('/dashboard');
        }

        // Échec de l'authentification
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function loginSubmitAdmin(Request $request, $type)
    {
        $User =DB::select("select u.* from users u where u.email='{$request->email}'");

        $roleID =$User[0]->RoleID;

        if ( $type!='admin' || $roleID!='admin') {
            abort(403, "Vous avez pas le droit d'acceder");
        }
        // Traitement pour d'autres types d'utilisateurs
                // Traitement pour le type 'etudiant'
                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    // L'utilisateur est connecté
                return redirect('/admin-Dashborad');
                    // return redirect()->intended('/dashboard');
                }
        
                // Échec de l'authentification
                return back()->withErrors([
                    'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
                ]);
    }


    // lougOut

    public function logoutAdmin(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginAdmin','admin');

    }

    public function logoutEtudiant(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginEtu','etudiant');

    }

    public function logoutProf(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginProf','prof');

    }

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest')->except(['logout', 'logoutProf', 'logoutEtudiant', 'logoutAdmin']);

    }

    
}
