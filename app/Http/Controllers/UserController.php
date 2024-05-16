<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Demande;
use App\Models\Category;
use App\Models\Partenaire;
use App\Models\Commentaire;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{

    public function showProfile(User $user)
    {
        return view('client-profile', ['user' => $user]);
    }

    public function updateProfile(Request $request, User $user)
    {
        $incomingFields1 = $request->validate([
            'username' => ['required', 'min:3', 'max:20'],
        ]);

        $incomingFields2 = $request->validate([
            'password' => ['confirmed'],
        ]);

        if (!empty($incomingFields2['password'])) {
            $incomingFields2['password'] = bcrypt($incomingFields2['password']);
            $user->update($incomingFields2);
        }

        $user->update([...$incomingFields1]);

        $incomingFields3 = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'age' => 'required',
            'telephone' => 'required',
            'ville' => 'required',
            'email' => ['required'],
        ]);

        $filename = $user->client->image;

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('image'));
            $imgData = $image->cover(800, 800)->toJpeg();
            $filename = $incomingFields1['username'] . '.jpg';
        }

        $client = $user->client;

        $client->update([...$incomingFields3, 'image' => $filename]);
        if ($request->hasFile('image')) {
            Storage::put("public/clients/" . $filename, $imgData);
        }

        return redirect('/profile/' . $incomingFields1['username'])->with('success', 'Le profile a bien été modifié');
    }

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

        if ($incomingFields['loginusername'] == 'admin' && $incomingFields['loginpassword'] == 'admin') {
            return redirect('/admin/dashboard');
        }

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            $request->session()->put('user_id', Auth::id());
            $user = Auth::user();

            if ($user->user_type == 'partenaire') {
                return redirect('/dashboard-partenaire')->with('success', 'Vous vous êtes connecté avec succès.');
            } else {
                return redirect()->back()->with('success', 'Vous vous êtes connecté avec succès.');
            }
        } else {
            return redirect()->back()->with('failure', 'Connexion invalide.');
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
            auth()->login($user);
            return redirect('/')->with('success', 'Merci d\'avoir créé un compte.');
        } elseif ($user->user_type == 'partenaire') {
            Partenaire::create(['id_user' => $user->id_user, ...$incomingFields2, 'image' => $filename]);
            if ($request->hasFile('image')) {
                Storage::put("public/partenaires/" . $filename, $imgData);
            }
            auth()->login($user);
            return redirect('/dashboard-partenaire')->with('success', 'Merci d\'avoir créé un compte.');
        }
    }

    public function dashboardPartenaire(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->user_type === 'partenaire') {
            $userId = $request->session()->get('user_id');

            $acceptedCount = Demande::where('etat', 'accepted')->where('id_user', $userId)->count();
            $refusedCount = Demande::where('etat', 'refused')->where('id_user', $userId)->count();
            $terminerCount = Demande::where('etat', 'terminer')->where('id_user', $userId)->count();

            // Calculate the total demands for the specific user
            $totalCount = Demande::where('id_user', $userId)->count();

            // Calculate rates or percentages if necessary
            $acceptanceRate = $totalCount ? ($acceptedCount / $totalCount) * 100 : 0;
            $refusalRate = $totalCount ? ($refusedCount / $totalCount) * 100 : 0;


            $commentsByDate = Commentaire::selectRaw(
                'DATE(date_commentaire) AS date, ' .
                    'SUM(CASE WHEN `like` = "like" THEN 1 ELSE 0 END) AS like_count, ' .
                    'SUM(CASE WHEN `like` = "dislike" THEN 1 ELSE 0 END) AS dislike_count, ' .
                    'COUNT(*) AS total_comments'
            )
                ->where('id_user', $userId) // Only include comments for the specified user
                ->groupBy('date') // Group by date (ensure it's DATE(date_commentaire))
                ->orderBy('date', 'asc') // Ensure correct order
                ->get();


            // Prepare arrays for chart data
            $dates = [];
            $likeCounts = [];
            $dislikeCounts = [];
            $totalComments = [];

            foreach ($commentsByDate as $record) {
                $dates[] = $record->date; // Collect dates
                $likeCounts[] = $record->like_count; // Collect like counts
                $dislikeCounts[] = $record->dislike_count; // Collect dislike counts
                $totalComments[] = $record->total_comments; // Collect total comments
            }


            return view('dashboard-partenaire.dashboard-partenaire', [
                'acceptedCount' => $acceptedCount,
                'refusedCount' => $refusedCount,
                'terminerCount' => $terminerCount,
                'totalCount' => $totalCount,
                'acceptanceRate' => $acceptanceRate,
                'refusalRate' => $refusalRate,
                'dates' => json_encode($dates), // JSON-encoded data for JavaScript
                'likeCounts' => json_encode($likeCounts),
                'dislikeCounts' => json_encode($dislikeCounts),
                'totalComments' => json_encode($totalComments),

            ]);
        } else {
            return redirect('/')
                ->with('failure', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
        }
    }
}
