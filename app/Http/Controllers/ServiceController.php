<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        // Get the user ID from session
        $userId = session()->get('user_id'); // It should be 32
        $partnerId = DB::table('partenaire')
            ->select('id_partenaire')
            ->where('id_user', $userId)
            ->value('id_partenaire');
        // Validate form data
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'prix_intervention' => 'required|numeric',
            'domaine' => 'required|string',
            'type_intervention' => 'required|string',
        ]);

        // Find partenaire ID based on the user ID
        $interventionId = DB::table('interventions')
            ->select('id')
            ->where('nom', $validatedData['type_intervention'])
            ->value('id');



        // Create and save the new service
        $service = new Service();
        $service->id_user = $userId;
        $service->prix_intervention = $validatedData['prix_intervention'];
        $service->id_partenaire = $partnerId;
        $service->id_intervention =  $interventionId;
        $service->ville = $validatedData['ville'];
        $service->description = $validatedData['description'];
        $service->is_available = 1;


        $service->save();
        return redirect()->route('dashboard-partenaire')->with('success', 'Service added successfully!');
    }
    public function showService(Category $category, Intervention $intervention, Request $request)
    {
        if ($request['ville'] != "" && $request['ville'] != "all") {
            $services = $intervention->services()->where('ville', '=', $request['ville'])->get();
        } else {
            $services = $intervention->services()->get();
        }

        if ($request['sortby'] != "") {
            $services = $services->sortByDesc($request['sortby']);
        }

        $allServices = Service::all();

        foreach ($allServices as $service) {
            $rating = $service->commentaires->count() != 0 ? $service->commentaires->sum('rating') / $service->commentaires->count() : 0;
            $nb_demandes = $service->demandes->count();
            $nb_commentaires = $service->commentaires->count();
            $service->update(['rating' => $rating, 'nb_demandes' => $nb_demandes, 'nb_commentaires' => $nb_commentaires]);
        }


        return view('service-offers', [
            'categoryName' => $category->nom,
            'interventionName' => $intervention->nom,
            'services' => $services,
            'ville' => $request['ville'],
            'sortby' => $request['sortby']
        ]);
    }
}
