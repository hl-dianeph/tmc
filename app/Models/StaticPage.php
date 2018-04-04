<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StaticPage
 * @package App\Models
 * @version April 4, 2018, 4:20 pm UTC
 *
 * @property string name
 * @property string slug
 * @property string content
 * @property string keywords
 * @property string og_description
 */
class StaticPage extends Model
{
    use SoftDeletes;

    public $table = 'static_pages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'slug',
        'content',
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
        'slug' => 'string',
        'content' => 'string',
        'keywords' => 'string',
        'og_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|between:2,255',
        'content' => 'required'
    ];

    
}
