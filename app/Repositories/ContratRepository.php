<?php

namespace App\Repositories;

use App\Models\Contrat;
use App\Repositories\BaseRepository;

/**
 * Class ContratRepository
 * @package App\Repositories
 * @version January 20, 2023, 10:02 pm UTC
*/

class ContratRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'appartement_id',
        'debut',
        'fin'
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
        return Contrat::class;
    }
}
