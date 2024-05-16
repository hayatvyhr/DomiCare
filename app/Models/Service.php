<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';

    protected $primaryKey = 'id_service';

    protected $fillable = [
        'id_partenaire',
        'id_intervention',
        'ville',
        'description',
        'prix_intervention',
        'rating',
        'nb_commentaires',
        'nb_demandes',
        'is_available',
        'id_user'
    ];


    public $timestamps = false;


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

    public function interventions()
    {
        return $this->belongsTo(Intervention::class, 'id_intervention');
    }

    public function getCommentairesSumAttribute()
    {
        return $this->commentaires()->sum('rating');
    }
}
