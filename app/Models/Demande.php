<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $table = 'demande';

    public $timestamps = false;

    protected $fillable = [
        'id_client',
        'id_partenaire',
        'id_service',
        'date_reservation',
        'duree',
        'etat',
        'completed_at',
        'prix_total',
        'id_user'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'id_partenaire');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
