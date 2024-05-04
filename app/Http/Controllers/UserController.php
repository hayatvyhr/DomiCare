<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Category;
use App\Models\Partenaire;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{

    public function showSignupFrom()
    {
        return view('signup');
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
            'email' => ['required', 'email', Rule::unique('client', 'email'), Rule::unique('partenaire', 'email')],
        ]);

        $user = User::create($incomingFields1);

        $request->validate([
            'image' => 'image'
        ]);

        $filename = 'default_user.jpg';

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('image'));
            $imgData = $image->cover(800, 800)->toJpeg();
            $filename = $incomingFields1['username'] . '.jpg';
        }

        if ($user->user_type == 'client') {
            Client::create(['id_user' => $user->id_user, ...$incomingFields2, 'image' => $filename]);
            if ($request->hasFile('image')) {
                Storage::put("public/clients/" . $filename, $imgData);
            }
        } elseif ($user->user_type == 'partenaire') {
            Partenaire::create(['id_user' => $user->id_user, ...$incomingFields2, 'image' => $filename]);
            if ($request->hasFile('image')) {
                Storage::put("public/partenaires/" . $filename, $imgData);
            }
        }

        auth()->login($user);
        return redirect('/')->with('success', 'Merci d\'avoir créé un compte.');
    }
}
