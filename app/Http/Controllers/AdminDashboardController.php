<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importez la classe DB pour utiliser DB::raw()
use App\Models\Client;
use App\Models\Partenaire;
use App\Models\demande;
use App\Models\Intervention;
use App\Models\Service; // Importez le modèle Service
use App\Models\Categorie;
use App\Models\Commentaire; // Ajout du modèle Commentaire

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Vos autres données
        $totalClients = Client::count();
        $totalPartners = Partenaire::count();
        $totalDemandes = Demande::count();
        $totalInterventions = Intervention::count();
        $partenaires = DB::table('partenaire')->get();
        $services = DB::table('service')
            ->join('partenaire', 'service.id_partenaire', '=', 'partenaire.id_partenaire')->join('interventions', 'service.id_intervention', '=', 'interventions.id')
            ->select('partenaire.email', 'service.ville', 'service.is_available', 'partenaire.nom', 'interventions.nom', 'partenaire.prenom', 'partenaire.image')
            ->distinct()
            ->get();
        $clients = Client::select('nom', 'prenom', 'email', 'telephone', 'ville')->get();

        // Récupérer les données pour le graphique
        $interventionsByCategory = Intervention::select('id_categorie', DB::raw('COUNT(*) as total'))
            ->groupBy('id_categorie')
            ->get();

        $labels = [];
        $data = [];

        foreach ($interventionsByCategory as $intervention) {
            switch ($intervention->id_categorie) {
                case 1:
                    $labels[] = "Jardinage";
                    break;
                case 2:
                    $labels[] = "Plomberie";
                    break;
                case 3:
                    $labels[] = "Ménage";
                    break;
                default:
                    $labels[] = "Autre";
            }
            $data[] = $intervention->total;
        }

        // Récupérer les données pour le graphique polarArea
        // Récupérer les données pour le graphique polarArea
        $likeCount = Commentaire::where('like', 'like')->count();
        $dislikeCount = Commentaire::where('like', 'dislike')->count();

        // Passer toutes les données à la vue dashboard-admin



        // Construire les données pour le graphe polarArea
        $chartData = [
            'labels' => ['Like', 'Dislike'],
            'datasets' => [
                [
                    'label' => '# of Votes',
                    'data' => [$likeCount, $dislikeCount],
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                ],
            ],
        ];

        // Passer toutes les données à la vue dashboard-admin
        return view('dashboard-admin.dashboard-admin', compact('totalClients', 'totalPartners', 'totalDemandes', 'totalInterventions', 'services', 'clients', 'labels', 'data', 'likeCount', 'dislikeCount', 'partenaires'));
    }
}
