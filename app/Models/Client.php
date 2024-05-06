<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $primaryKey = 'id_client';

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

    public function image()
    {
        return $this->image;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_client');
    }
}
