<?php

namespace App\Repositories;

use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TmRepository
 * @package App\Repositories
 * @version March 29, 2018, 7:08 am UTC
 *
*/
class TmRepository extends BaseRepository
{
    protected $perPage = 25;

    /**
     * Configure the Model
     **/
    public function model()
    {
        return null;
    }

    /**
     * Paginate wit $perPage
     */
    public function paginate($limit = null, $columns = []) {
        return parent::paginate($this->perPage, $columns);
    }
}
