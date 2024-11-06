<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    // Définissez ici les colonnes qui peuvent être assignées en masse
    protected $fillable = ['title', 'description', 'date', 'user_id'];

    /**
     * Relation avec d'autres modèles si nécessaire
     * Exemple: Si chaque activité est associée à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
