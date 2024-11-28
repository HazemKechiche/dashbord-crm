<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $table = 'taches'; // Replace 'taches' with your database table name if different
    protected $primaryKey = 'id'; // If the primary key column is named differently, replace 'id' with the correct column name

    // Define the fillable attributes that can be mass-assigned
    protected $fillable = [
        'Gestionnairedetache',
        'DatedEcheance',
        'DateD',
        'DateF',
        'Etat',
        'Localisation',
        'type',
        'Priorite',
        'Description',
        // Add other attributes as needed
    ];

    // Optionally, you can define relationships, if the Tache model has any
    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'tache_employe', 'tache_id', 'employe_id');
    }
}
