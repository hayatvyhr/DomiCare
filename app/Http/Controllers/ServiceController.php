<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Intervention;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showService(Category $category, Intervention $intervention, Request $request)
    {
        // $services = $intervention->services()->where('ville', '=', 'Tetouan')->get();

        if ($request['ville'] != "" && $request['ville'] != "all") {
            $services = $intervention->services()->where('ville', '=', $request['ville'])->get();
        } else {
            $services = $intervention->services()->get();
        }

        if ($request['sortby'] != "") {
            $services = $services->sortByDesc($request['sortby']);
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
