<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use Illuminate\Http\Request;
use App\Models\demande;
use Illuminate\Support\Facades\DB;
use App\Models\Partenaire;
use App\Models\Service;

class partenaireController extends Controller
{
    public function service(Request $request)
    {
        $userId = $request->session()->get('user_id');
        if (!$userId) {
            return redirect('/')->with('failure', 'Vous devez vous connecter.');
        }

        // Retrieve services with the count of demands and sum of ratings for each service
        $servicesWithDemandsCount = Service::where('id_user', $userId)
            ->withCount('demandes') // Count the related demands
            ->withCount('commentaires')
            ->withSum('commentaires', 'rating')
            ->get();

        return view('dashboard-partenaire/dashboard-service', compact('servicesWithDemandsCount', 'userId'));
    }

    public function showAll($serviceId, Request $request)
    {
        // Fetch the service with its comments
        $service = Service::findOrFail($serviceId);

        // Retrieve the user ID from the session
        $userId = $request->session()->get('user_id');

        // Retrieve comments for the service where the emetteur is a client and id_user matches the user ID
        $comments = Commentaire::where('commentaire.emetteur', 'client') // Specify table alias for 'emetteur'
            ->where('commentaire.id_user', $userId) // Specify table alias for 'id_user'
            ->where('commentaire.id_service', $serviceId) // Specify table alias for 'id_service'
            ->join('client', 'commentaire.id_client', '=', 'client.id_client')
            ->get();

        // Pass the service and its filtered comments to the view
        return view('dashboard-partenaire/dashboard-comments-service', compact('service', 'comments'));
    }

    public function update(Request $request, $serviceId)
    {
        // Validate the incoming request data
        $request->validate([
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        // Find the service by its ID
        $service = Service::findOrFail($serviceId);

        // Update the service details
        $service->description = $request->input('description');
        $service->prix_intervention = $request->input('price');
        $service->ville = $request->input('location');

        // Save the updated service
        $service->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        // Delete the service
        $service->delete();

        // Optionally, redirect the user after deletion
        return redirect()->route('dashboard-partenaire-service')->with('success', 'Service deleted successfully.');
    }
    public function availability(Service $service)
    {
        // Toggle the is_available column
        $service->is_available = !$service->is_available;
        $service->save();

        return redirect()->route('dashboard-partenaire-service')->with('success', 'Service availability changed successfully.');
    }

    public function profil(Request $request)
    {
        // Retrieve user ID from the session
        $userId = $request->session()->get('user_id');

        // If there's no user ID, redirect or handle it as an error
        if (!$userId) {
            return redirect('/')->with('failure', 'Vous devez vous connecter.');
        }

        $data = Partenaire::where('id_user', '=', $userId)->first();
        $demandesTerminees = demande::where('id_partenaire', '=', $userId)
            ->where('etat', 'terminer')

            ->get();

        return view('dashboard-partenaire/dashboard-profil', compact('data', 'demandesTerminees', 'userId'));
    }

    public function dash_comments(Request $request)
    {
        $userId = $request->session()->get('user_id');

        // Retrieve demands for user 39 with state 'terminer' along with associated client information
        $demandesTerminees = Demande::where('id_user', $userId)
            ->where('etat', 'terminer')
            ->with('client') // Eager load the client relationship
            ->get();

        // Pass the retrieved data to the view
        return view('dashboard-partenaire/dashboard-comments', compact('demandesTerminees'));
    }






    //client add comment
    public function storeComment(Request $request)
    {

        $userId = $request->session()->get('user_id');

        DB::table('commentaire')->insert([
            'id_client' => $request->input('id_client'),
            'commentaire' => $request->input('commentaire'),
            'date_commentaire' => now(),
            'rating' => $request->input('rating'),
            'id_user' => $userId,
            'id_service' => $request->input('id_service'),
            'emetteur' => 'partenaire',
            'like' => $request->input('like_dislike'),
        ]);
        return redirect()->back();
    }

    public function update_client(Request $request)
    {
        $userId = $request->session()->get('user_id');

        // Retrieve the user data
        $userData = DB::table('partenaire')
            ->where('id_user', $userId)
            ->first();

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/storage/partenaires'), $imageName);
        } else {
            // If no image is uploaded, retain the existing image
            $imageName = $userData->image;
        }

        // Update the user data in the database
        DB::table('partenaire')
            ->where('id_user', $userId)
            ->update([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'ville' => $request->input('ville'),
                'age' => $request->input('age'),
                'email' => $request->input('email'),
                'telephone' => $request->input('telephone'),
                'image' => $imageName,
            ]);

        return redirect()->back();
    }






    //   //partenaire
    //       public function dash_partenaire(Request $request){
    //         $id = $request->id ;
    //         $data = Client::where('id_user', '=', $id)->first();
    //         $demandesTerminees = Demande::where('id_client', $id)
    //                                       ->where('etat', 'termine')
    //                                       ->get();

    //         return view('dashboard-client/dashboard-client', compact('data', 'demandesTerminees'));
    //     }
}
