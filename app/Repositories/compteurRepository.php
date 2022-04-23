<?php

namespace App\Repositories;

use App\Models\compteur;
use App\Repositories\BaseRepository;

/**
 * Class compteurRepository
 * @package App\Repositories
 * @version April 23, 2022, 7:15 am UTC
*/

class compteurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'appartement_id',
        'type',
        'reference'
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
        return compteur::class;
    }
}
