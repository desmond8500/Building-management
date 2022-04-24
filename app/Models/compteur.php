<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Compteur extends Model
{
    use SoftDeletes;

    public $table = 'compteurs';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'appartement_id',
        'type',
        'reference'
    ];

    protected $casts = [
        'id' => 'integer',
        'appartement_id' => 'integer',
        'type' => 'string',
        'reference' => 'string'
    ];

    public static $rules = [

    ];

    /**
     * Get the appartement that owns the Compteur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appartement(): BelongsTo
    {
        return $this->belongsTo(Appartement::class);
    }
}
