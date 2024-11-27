<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appartement extends Model
{
    use SoftDeletes;

    public $table = 'appartements';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'batiment_id',
        'nom',
        'numero',
        'niveau',
        'adresse',
        'statut'
    ];

    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'numero' => 'string',
        'niveau' => 'string',
        'adresse' => 'string',
        'statut' => 'string',
    ];

    public static $rules = [

    ];

    public function compteur(): HasOne
    {
        return $this->hasOne(Compteur::class);
    }

    public function contrat(): HasOne
    {
        return $this->hasOne(Contrat::class);
    }

    public function batiment(): BelongsTo
    {
        return $this->belongsTo(Batiment::class);
    }

}
