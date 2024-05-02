<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Client;
use App\Models\Intervention;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function showSignupFrom()
    {
        return view('signup');
    }

    public function profile(User $user)
    {
        return view('profile-posts', [
            'username' => $user->username, 'posts' => $user->posts()->latest()->get(),
            'postsCount' => $user->posts()->count(),
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Vous êtes maintenant déconnecté.');
    }

    public function showIndexPage()
    {
        return view('index', ['categories' => Category::all(), 'interventions' => Intervention::all()]);
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Vous vous êtes connecté avec succès.');
        } else {
            return redirect('/')->with('failure', 'Connexion invalide.');
        }
    }

    public function register(Request $request)
    {
        $incomingFields1 = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('user', 'username')],
            'password' => ['required', 'min:8', 'confirmed'],
            'user_type' => 'required'
        ]);

        $incomingFields1['password'] = bcrypt($incomingFields1['password']);



        $incomingFields2 = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'age' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'email' => ['required', 'email', Rule::unique('client', 'email'), Rule::unique('partenaire', 'email')]
        ]);

        $user = User::create($incomingFields1);

        if ($user->user_type == 'client') {
            $client = Client::create(['id_user' => $user->id_user, ...$incomingFields2]);
        } elseif ($user->user_type == 'partenaire') {
            $partenaire = Partenaire::create(['id_user' => $user->id_user, ...$incomingFields2]);
        }

        auth()->login($user);
        return redirect('/')->with('success', 'Merci d\'avoir créé un compte.');
    }
}
