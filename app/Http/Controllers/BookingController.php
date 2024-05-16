<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Demande;
use App\Models\Service;
use App\Models\Category;
use App\Models\Partenaire;
use App\Models\Commentaire;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;


class BookingController extends Controller
{
    public function commenterService(Request $request)
    {
        $incomingFields = $request->validate([
            'id_client' => 'required',
            'id_service' => 'required',
            'commentaire' => 'required',
            'date_commentaire' => 'required',
            'rating' => 'required',
            'emetteur' => 'required',
            'id_user' => 'required'
        ]);

        $service = Service::where('id_service', $incomingFields['id_service'])->first();
        $nb_commentaires = $service->commentaires->count();
        $commentaireRecord = Commentaire::where('id_client', $incomingFields['id_client'])->where('id_service', $incomingFields['id_service'])->first();

        if ($commentaireRecord) {
            $ratingCommentaire = $commentaireRecord->rating;
            $rating = ($service->commentaires->sum('rating') - $ratingCommentaire + $incomingFields['rating']) / $nb_commentaires;
            $service->update(['rating' => $rating]);
            $commentaireRecord->update(['commentaire' => $incomingFields['commentaire'], 'rating' => $incomingFields['rating']]);
        } else {
            $rating = $nb_commentaires != 0 ? ($service->commentaires->sum('rating') + $incomingFields['rating']) / ($nb_commentaires + 1) : $incomingFields['rating'];
            $service->update(['nb_commentaires' => $nb_commentaires + 1]);
            $service->update(['rating' => $rating]);
            Commentaire::create($incomingFields);
        }
        return redirect()->back()->with('success', 'Votre commentaire a bien été enregisté');
    }
    public function supprimerReservation(Request $request)
    {
        $demande = Demande::where('id_demande', $request->get('id_demande'))->first();
        $service = $demande->service;
        $nb_demandes = $service->demandes->count();
        $service->update(['nb_demandes' => $nb_demandes - 1]);
        $demande->delete();
        return redirect()->back()->with('success', 'La réservation a bien été supprimé.');
    }
    public function showReservations($etat)
    {
        if ($etat == 'onHold') {
            $demandes =  auth()->user()->client->demandes()->where('etat', NULL)->get()->sortByDesc('id_demande');
        } elseif ($etat == 'accepted') {
            $demandes =  auth()->user()->client->demandes()->where('etat', 'accepted')->get()->sortByDesc('id_demande');
        } elseif ($etat == 'refused') {
            $demandes =  auth()->user()->client->demandes()->where('etat', 'refused')->get()->sortByDesc('id_demande');
        } elseif ($etat == 'completed') {
            $demandes =  auth()->user()->client->demandes()->where('etat', 'completed')->get()->sortByDesc('id_demande');
        } else {
            return redirect()->back();
        }

        return view('reservations', [
            'demandes' => $demandes,
        ]);
    }


    public function reserver(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'id_client' => 'required',
                'id_partenaire' => 'required',
                'id_service' => 'required',
                'date_reservation' => 'required',
                'duree' => 'required',
                'id_user' => 'required',
            ]
        );

        $date_debut = $incomingFields['date_reservation'];
        $date_fin = now()->parse($incomingFields['date_reservation'])->addDays((int)$incomingFields['duree']);

        $service = Service::where('id_service', $incomingFields['id_service'])->first();
        foreach ($service->demandes as $demande) {
            if ($demande->etat == 'accepted') {
                if (($date_debut >= $demande->date_reservation && $date_debut <= now()->parse($demande->date_reservation)->addDays($demande->duree)) || ($date_fin >= $demande->date_reservation && $date_fin <= now()->parse($demande->date_reservation)->addDays($demande->duree))) {
                    return redirect()->back()->with('failure', 'La date que vous avez choisis est déja réservée');
                }
            }
        }

        $prix_intervention = $request->validate(['prix_intervention' => 'required']);

        $prix_total = $prix_intervention['prix_intervention'] * $incomingFields['duree'];

        Demande::create([...$incomingFields, 'prix_total' => $prix_total]);

        $nb_demandes = $service->demandes->count();

        $service->update(['nb_demandes' => $nb_demandes + 1]);

        // Retrieve client information
        $client = Client::findOrFail($incomingFields['id_client']);
        $clientNom = $client->nom;
        $clientPrenom = $client->prenom;
        $clientEmail = $client->email;

        // Retrieve partner information
        $partenaire = Partenaire::findOrFail($incomingFields['id_partenaire']);
        $partenaireEmail = $partenaire->email;
        $partenaireNom = $partenaire->nom;
        $partenairePrenom = $partenaire->prenom;

        // Send email to partner
        Mail::to($partenaireEmail)->send(new HelloMail([
            'emailType' => 'confirm',
            'clientNom' => $clientNom,
            'clientPrenom' => $clientPrenom,
            'clientEmail' => $clientEmail,
            'partenaireNom' => $partenaireNom,
            'partenairePrenom' => $partenairePrenom,
            'demande' => $demande,
            'duree' => $incomingFields['duree'],
            'date_reservation' => $incomingFields['date_reservation'],
            'prix_total' => $prix_total,

        ]));

        return redirect()->back()->with('success', 'La réservation a bien été enregisté. Un mail est envoyé au partenaire.');
    }

    public function showBookingForm(Category $category, Intervention $intervention, Service $service)
    {
        return view('booking', [
            'category' => $category,
            'intervention' => $intervention,
            'service' => $service,
            'similarServices' => $intervention->services()->whereNot('id_service', '=', $service->id_service)->limit(6)->get()->sortByDesc('nb_demandes')
        ]);
    }
}
