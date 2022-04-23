<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Clients
 * @package App\Models
 * @version April 23, 2022, 7:14 am UTC
 *
 * @property string $prenom
 * @property string $nom
 * @property string $genre
 */
class Clients extends Model
{
    use SoftDeletes;


    public $table = 'clients';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'prenom',
        'nom',
        'genre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prenom' => 'string',
        'nom' => 'string',
        'genre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
