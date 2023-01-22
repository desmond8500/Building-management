<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'genre',
        'ci',
        'delivre',
        'statut',
    ];

    protected $casts = [
        'id' => 'integer',
        'prenom' => 'string',
        'nom' => 'string',
        'genre' => 'string',
        'ci' => 'string',
        'delivre' => 'string',
        'statut' => 'string',
    ];

    public static $rules = [

    ];


    public function contrat(): HasOne
    {
        return $this->hasOne(Contrat::class);
    }



}
