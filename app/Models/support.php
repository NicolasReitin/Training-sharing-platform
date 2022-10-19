<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date_debut',
        'date_fin',
        'piece_jointe',
        'users_id',
        'sequence',

    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function getNameFromUrl($item){
        $urlItem = explode('/', $item)[1];
        return $urlItem;
    }
}
