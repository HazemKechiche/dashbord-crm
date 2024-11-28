<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    use HasFactory;

    protected $table = 'affaire'; // Replace 'affaires' with your database table name if different
    protected $primaryKey = 'id'; // If the primary key column is named differently, replace 'id' with the correct column name

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
        // Add other attributes as needed
    ];

    // Optionally, you can define relationships, if the Affaire model has any

    public function client()
    {
        return $this->belongsTo(Client::class, 'Nom', 'Nom');
    }
}
