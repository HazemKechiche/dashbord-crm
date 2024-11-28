<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    use HasFactory;

   
   

    protected $fillable = [
        'GestionnaireAffaire',
        'NomAffaire',
        'NomClient',
        'Type',
        'OrigineProspect',
        'Montant',
        'DateEcheance',
        'Etape',
        'ChiffreAffaires',
        'DescriptionAttendue',
        'client_id'
        // Add other attributes as needed
    ];

    // Optionally, you can define relationships, if the Affaire model has any

    public function client()
    {
        return $this->belongsTo(Client::class, 'Nom', 'Nom');
    }
}
