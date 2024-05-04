<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';

    public function intervention()
    {
        return $this->belongsTo(Intervention::class, 'id_intervention');
    }
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'id_partenaire');
    }
}
