<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;
    protected $table = 'partenaire';
    protected $primaryKey = 'id_partenaire';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'nom',
        'prenom',
        'age',
        'email',
        'telephone',
        'ville',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
