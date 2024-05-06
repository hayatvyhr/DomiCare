<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaire';

    protected $primaryKey = 'id_commentaire';


    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}
