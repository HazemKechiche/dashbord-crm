<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $fillable = [
        'GestionnaireDuProspect',
        'Prénom',
        'Nom',
        'Titre',
        'E-mail',
        'Téléphone',
        'StatutduProspect',
        'ChiffreAffaires',
        'Nbredemployes',
        'Address',
        'Codepostal',
        'pdf_filename',
    ];

    // Add any additional methods or relationships here if needed
}
