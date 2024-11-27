<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Batiment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address',
    ];

    public function appartements(): HasMany
    {
        return $this->hasMany(Appartement::class, 'batiment_id');
    }

    public function contrats(): HasManyThrough
    {
        return $this->hasManyThrough(Contrat::class, Appartement::class);
    }
}
