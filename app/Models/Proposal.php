<?php
// app/Models/Proposal.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'client_id', 'title', 'description', 'presentation_file',
    ];

    // Relation avec l'entité Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
