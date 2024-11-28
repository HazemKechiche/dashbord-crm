<?php

namespace App\models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationTemplate extends Model
{
    protected $fillable = ['client_id', 'type', 'subject', 'content'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    
}
