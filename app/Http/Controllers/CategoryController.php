<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Intervention;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory(Category $category)
    {

        return view('services-by-category', [
            'categoryName' => $category->nom,
            'categories' => Category::all(),
            'interventions' => $category->interventions()->get(),
        ]);
    }
}
