<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Type
 * @package App\Models
 * @version April 8, 2018, 5:33 am UTC
 *
 * @property string name
 * @property string slug
 */
class Type extends Model
{
    use SoftDeletes;

    public $table = 'types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'required|unique:types'
    ];


    public const TYPE_BOT = 1;
    public const TYPE_CHANNEL = 2;
    

    /**
     * Dropdown for select
     * 
     */
    public static function dropdown() {
        $types = self::orderBy('name')->pluck('name', 'id');

        return [null => 'Выберите тип'] + $types->toArray();
    }
}
