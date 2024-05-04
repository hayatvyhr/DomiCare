<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $table = 'interventions';

    public function nom()
    {
        return $this->nom;
    }

    public function description()
    {
        return $this->description;
    }

    public function image()
    {
        return $this->image;
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'id_intervention');
    }
}
