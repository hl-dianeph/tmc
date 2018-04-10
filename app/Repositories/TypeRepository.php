<?php

namespace App\Repositories;

use App\Models\Type;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TypeRepository
 * @package App\Repositories
 * @version April 8, 2018, 5:33 am UTC
 *
 * @method Type findWithoutFail($id, $columns = ['*'])
 * @method Type find($id, $columns = ['*'])
 * @method Type first($columns = ['*'])
*/
class TypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Type::class;
    }
}
