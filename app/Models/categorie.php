<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
    ];

    public function support() {
        return $this->hasMany(Support::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'categorie_formateurs');
    }
}
