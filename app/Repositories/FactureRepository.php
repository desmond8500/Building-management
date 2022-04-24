<?php

namespace App\Repositories;

use App\Models\Facture;
use App\Repositories\BaseRepository;

/**
 * Class FactureRepository
 * @package App\Repositories
 * @version April 24, 2022, 2:40 am UTC
*/

class FactureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'compteur_id',
        'montant',
        'date',
        'facture'
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
        return Facture::class;
    }
}
