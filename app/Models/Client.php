<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Client
 * @package App\Models
 * @version April 23, 2022, 7:13 am UTC
 *
 * @property string $prenom
 * @property string $nom
 * @property string $genre
 */
class Client extends Model
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

    /**
     * Get all of the appart for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function apparts(): HasManyThrough
    {
        return $this->hasManyThrough(Appartement::class, ClientAppartement::class, 'client_id');
    }


}
