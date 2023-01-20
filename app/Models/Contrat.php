<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Contrat",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="client_id",
 *          description="client_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="appartement_id",
 *          description="appartement_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="debut",
 *          description="debut",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fin",
 *          description="fin",
 *          type="string",
 *          format="date"
 *      )
 *      @SWG\Property(
 *          property="montant",
 *          description="montant",
 *          type="string",
 *          format="string"
 *      )
 * )
 */
class Contrat extends Model
{
    use SoftDeletes;

    public $table = 'contrats';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'client_id',
        'appartement_id',
        'debut',
        'fin',
        'montant',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'appartement_id' => 'integer',
        'debut' => 'date',
        'fin' => 'date',
        'montant' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function appartement(): BelongsTo
    {
        return $this->belongsTo(Appartement::class);
    }


    // public function client()
    // {
    //     return $this->hasOne(\App\Models\Client::class);
    // }

    // public function appartement()
    // {
    //     return $this->hasOne(\App\Models\Appartement::class);
    // }
}
