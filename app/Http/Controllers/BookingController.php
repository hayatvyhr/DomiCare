<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\Intervention;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showReservation(Category $category, Intervention $intervention, Service $service)
    {
        return view('reservation', [
            'category' => $category,
            'intervention' => $intervention,
            'service' => $service,
            'similarServices' => $intervention->services()->whereNot('id_service', '=', $service->id_service)->limit(6)->get()->sortByDesc('nb_demandes')
        ]);
    }
}
