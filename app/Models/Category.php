<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version March 29, 2018, 7:08 am UTC
 *
 * @property string name
 * @property strint short_dest
 * @property string full_desc
 * @property string image
 * @property string keywords
 * @property string og:description
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'short_desc',
        'full_desc',
        'image',
        'keywords',
        'og_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'full_desc' => 'string',
        'image' => 'string',
        'keywords' => 'string',
        'og_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:categories|between:2,255',
        'short_desc' => 'required',
        'full_desc' => 'required'
    ];

    
}
