<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Service;
use App\Models\Category;
use App\Models\Commentaire;
use App\Models\Intervention;
use Illuminate\Http\Request;

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

        $commentaireRecord = Commentaire::where('id_client', $incomingFields['id_client'])->where('id_service', $incomingFields['id_service'])->first();
        if ($commentaireRecord) {
            $commentaireRecord->update(['commentaire' => $incomingFields['commentaire'], 'rating' => $incomingFields['rating']]);
        } else {
            Commentaire::create($incomingFields);
        }
        return redirect()->back()->with('success', 'Votre commentaire a bien été enregisté');
    }
    public function supprimerReservation(Request $request)
    {
        Demande::where('id_demande', $request->get('id_demande'))->delete();
        return redirect()->back()->with('success', 'La réservation a bien été supprimé.');
    }
    public function showReservations($etat)
    {
        if ($etat == 'onHold') {
            $demandes =  auth()->user()->client->demandes()->where('etat', NULL)->get();
        } elseif ($etat == 'accepted') {
            $demandes =  auth()->user()->client->demandes()->where('etat', 'accepted')->get();
        } elseif ($etat == 'refused') {
            $demandes =  auth()->user()->client->demandes()->where('etat', 'refused')->get();
        } elseif ($etat == 'completed') {
            $demandes =  auth()->user()->client->demandes()->where('etat', 'completed')->get();
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

        return redirect()->back()->with('success', 'La réservation a bien été enregisté.');
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
