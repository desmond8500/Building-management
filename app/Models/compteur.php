<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class compteur
 * @package App\Models
 * @version April 23, 2022, 7:15 am UTC
 *
 * @property integer $appartement_id
 * @property string $type
 * @property string $reference
 */
class compteur extends Model
{
    use SoftDeletes;


    public $table = 'compteurs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'appartement_id',
        'type',
        'reference'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'appartement_id' => 'integer',
        'type' => 'string',
        'reference' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
