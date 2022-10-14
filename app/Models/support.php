<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class support extends Model
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

    public function getNameFromUrl($item){
        $urlItem = explode('/', $item)[1];
        return $urlItem;
    }
}
