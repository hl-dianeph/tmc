<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Settings
 * @package App\Models
 * @version April 4, 2018, 5:38 pm UTC
 *
 * @property string name
 * @property string type
 * @property string value
 */
class Setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'type',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'type' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:site_configs|between:2,255',
        'type' => 'required|between:2,255',
        'value' => 'required'
    ];

    
}
