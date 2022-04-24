<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appartement extends Model
{
    use SoftDeletes;

    public $table = 'appartements';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nom',
        'numero',
        'niveau',
        'adresse'
    ];

    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'numero' => 'string',
        'niveau' => 'string',
        'adresse' => 'string'
    ];

    public static $rules = [

    ];

    /**
     * Get the compteur associated with the Appartement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function compteur(): HasOne
    {
        return $this->hasOne(Compteur::class);
    }

}
