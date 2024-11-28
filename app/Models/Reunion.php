<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $table = 'reunions'; // Replace 'reunions' with your database table name
    protected $primaryKey = 'id'; // If the primary key column is named differently, replace 'id' with the correct column name
    public $timestamps = true; // Set to true if you want to use timestamps (created_at and updated_at)

    protected $fillable = [
        'nomReunion',
        'Emplacement',
        'dateD',
        'dateF',
        'Hote',
        'Rappel',
        'Description'
    ];
    public function employes()
    {
        return $this->belongsToMany(employe::class, 'reunion_employe', 'reunion_id', 'employe_id');
    }
}
