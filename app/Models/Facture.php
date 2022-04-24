<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Facture
 * @package App\Models
 * @version April 24, 2022, 2:40 am UTC
 *
 * @property integer $compteur_id
 * @property string $montant
 * @property string $date
 * @property string $facture
 */
class Facture extends Model
{
    use SoftDeletes;


    public $table = 'factures';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'compteur_id',
        'montant',
        'date',
        'facture',
        'numero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compteur_id' => 'integer',
        'montant' => 'string',
        'date' => 'date',
        'facture' => 'string',
        'numero' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Get the compteur that owns the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compteur(): BelongsTo
    {
        return $this->belongsTo(Compteur::class);
    }

}
