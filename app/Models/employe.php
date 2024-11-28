<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    protected $table = 'employees'; // Replace 'employees' with your database table name
    protected $primaryKey = 'id'; // If the primary key column is named differently, replace 'id' with the correct column name
    public $timestamps = false; // Set to true if you want to use timestamps (created_at and updated_at)

    protected $fillable = [
        'nom',
        'prenom',
        'E-mail',
        'Poste',
        'Telephone'
    ];
    public function taches()
    {
        return $this->belongsToMany(Tache::class, 'tache_employe', 'employe_id', 'tache_id');
    }
    public function reunions()
    {
        return $this->belongsToMany(Reunion::class, 'reunion_employe', 'employe_id', 'reunion_id');
    }
}
