<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function nom()
    {
        return $this->nom;
    }

    public function icon()
    {
        return $this->icon;
    }

    public function color()
    {
        return $this->color;
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'id_categorie');
    }
}
