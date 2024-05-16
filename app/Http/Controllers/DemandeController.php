<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Demande;
use App\Models\Service;
use App\Models\Partenaire;
use App\Models\Commentaire;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;


class DemandeController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve user ID from the session
        $userId = $request->session()->get('user_id');

        // If there's no user ID, redirect or handle it as an error
        if (!$userId) {
            return redirect('/')->with('failure', 'Vous devez vous connecter.');
        }

        // Fetch demandes for the current user
        $demandes = Demande::join('service', 'demande.id_service', '=', 'service.id_service')
            ->join('interventions', 'service.id_intervention', '=', 'interventions.id')
            ->join('categories', 'categories.id', '=', 'interventions.id_categorie')
            ->join('client', 'client.id_client', '=', 'demande.id_client')
            ->where(function ($query) {
                $query->whereNull('etat') // Include if 'etat' is null
                    ->orWhere('etat', '!=', 'refused'); // Include if 'etat' is not 'refused'

            })
            ->where('demande.id_user', $userId) // Only fetch records for the current user
            ->select([
                'demande.id_demande',
                'demande.id_user',
                'demande.date_reservation',
                'demande.duree',
                'demande.id_service',
                'demande.etat',
                'demande.prix_total',
                'service.ville',
                'service.prix_intervention',
                'categories.nom as categorie_nom',
                'interventions.nom as intervention_nom',
                'interventions.description',
                'client.nom as client_nom',
                'client.prenom as client_prenom',
                'client.id_client as id_client',
            ])
            ->orderBy('demande.id_demande', 'desc') // Order by descending 'id_demande'
            ->get();

        return view('dashboard-partenaire.demandes', compact('demandes'));
    }

    public function accept($id_demande)
    {
        $demande = demande::find($id_demande);
        $date_reservation = $demande->date_reservation;
        $prix_total = $demande->prix_total;
        $duree = $demande->duree;
        $id_service = $demande->id_service;
        $service = Service::find($id_service);
        $id_intervention = $service->id_intervention;
        $intervention = Intervention::find($id_intervention);
        $interventionNom = $intervention->nom;

        $id_client = $demande->id_client;
        $client = Client::find($id_client);
        $clientEmail = $client->email;
        $clientNom = $client->nom;
        $clientPrenom = $client->prenom;

        $userId = $demande->id_partenaire;
        $partenaire = Partenaire::find($userId);
        $partenaireNom = $partenaire->nom;
        $partenairePrenom = $partenaire->prenom;
        $partenaireEmail = $partenaire->email;


        if ($demande) {
            $demande->etat = 'accepted';
            $demande->save(); // Sauvegarder sans timestamp

            Mail::to($clientEmail)->send(new HelloMail([
                'emailType' => 'accept',
                'clientNom' => $clientNom,
                'clientPrenom' => $clientPrenom,
                'clientEmail' => $clientEmail,
                'partenaireNom' => $partenaireNom,
                'partenairePrenom' => $partenairePrenom,
                'partenaireEmail' => $partenaireEmail,
                'date_reservation' => $date_reservation,
                'prix_total' => $prix_total,
                'duree' => $duree,
                'interventionNom' => $interventionNom,

            ]));
        }

        return redirect()->back();
    }

    public function refuse($id_demande)
    {
        $demande = demande::find($id_demande);
        $date_reservation = $demande->date_reservation;
        $prix_total = $demande->prix_total;
        $duree = $demande->duree;
        $id_service = $demande->id_service;
        $service = Service::find($id_service);
        $id_intervention = $service->id_intervention;
        $intervention = Intervention::find($id_intervention);
        $interventionNom = $intervention->nom;

        $id_client = $demande->id_client;
        $client = Client::find($id_client);
        $clientEmail = $client->email;
        $clientNom = $client->nom;
        $clientPrenom = $client->prenom;

        $userId = $demande->id_partenaire;
        $partenaire = Partenaire::find($userId);
        $partenaireNom = $partenaire->nom;
        $partenairePrenom = $partenaire->prenom;
        $partenaireEmail = $partenaire->email;

        if ($demande) {
            $demande->etat = 'refused';
            $demande->save(); // Sauvegarder sans timestamp
            Mail::to($clientEmail)->send(new HelloMail([
                'emailType' => 'refus',
                'clientNom' => $clientNom,
                'clientPrenom' => $clientPrenom,
                'clientEmail' => $clientEmail,
                'partenaireNom' => $partenaireNom,
                'partenairePrenom' => $partenairePrenom,
                'partenaireEmail' => $partenaireEmail,
                'date_reservation' => $date_reservation,
                'prix_total' => $prix_total,
                'duree' => $duree,
                'interventionNom' => $interventionNom,

            ]));
        }

        return redirect()->back();
    }
    public function terminer($id_demande)
    {
        $demande = Demande::find($id_demande);

        if ($demande) {
            $demande->etat = 'terminer'; // Set the "Etat" column to "terminer"
            $demande->completed_at = now(); // Set the current date and time
            $demande->save(); // Save changes to the database
        }

        return redirect()->back(); // Redirect back to the previous page
    }



    public function show($id_client)
    {
        // Retrieve client information using the $id_client
        $client = Client::findOrFail($id_client);

        // Retrieve comments made by the partner for the client
        $comments = Commentaire::join('service', 'commentaire.id_service', '=', 'service.id_service')->join('partenaire', 'partenaire.id_partenaire', '=', 'service.id_partenaire')
            ->where('commentaire.id_client', $id_client)
            ->where('commentaire.emetteur', 'partenaire')
            ->select('commentaire.*', 'partenaire.nom', 'partenaire.prenom', 'partenaire.image')
            ->get();

        // Pass client and comments information to the view
        return view('dashboard-partenaire.dashboard-profil-client', compact('client', 'comments'));
    }
}
