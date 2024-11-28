<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'GestionnaireDuContact',
        'Prenom',
        'Nom',
        'E-mail',
        'Telephone',
        'NomDuFournisseur',
        'Département',
        'Telecopie',
        'Adresse',
        'CodePostal',
        'Description',
        'idSecteur'
    ];

    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'idSecteur');
    }
}