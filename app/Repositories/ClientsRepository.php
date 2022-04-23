<?php

namespace App\Repositories;

use App\Models\Clients;
use App\Repositories\BaseRepository;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version April 23, 2022, 7:14 am UTC
*/

class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prenom',
        'nom',
        'genre'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Clients::class;
    }
}
