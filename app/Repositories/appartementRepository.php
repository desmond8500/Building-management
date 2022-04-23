<?php

namespace App\Repositories;

use App\Models\appartement;
use App\Repositories\BaseRepository;

/**
 * Class appartementRepository
 * @package App\Repositories
 * @version April 23, 2022, 7:17 am UTC
*/

class appartementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'numero',
        'niveau',
        'adresse'
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
        return appartement::class;
    }
}
