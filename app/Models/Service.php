<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';

    protected $primaryKey = 'id_service';

    public function intervention()
    {
        return $this->belongsTo(Intervention::class, 'id_intervention');
    }
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'id_partenaire');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_service');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class, 'id_service');
    }
}
