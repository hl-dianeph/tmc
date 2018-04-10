<?php

namespace App\Models;

use App\Models\Channel;
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
        'slug',
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
        'slug' => 'string',
        'full_desc' => 'string',
        'image' => 'string',
        'keywords' => 'string',
        'og_description' => 'string'
    ];

    
    /**
     * Constants
     *
     */

    public const DEFAULT_IMAGE = 'default.png';
    public const IMAGE_PUBLIC_DIR = 'images/categories/';


    public function scopeTopLevel($query) {
        return $query->whereParentId(null);
    }

    /**
     * Dropdown for select (TOP LEVEL)
     * 
     */
    public static function dropdown() {
        $categories = self::topLevel()->orderBy('name')->pluck('name', 'id');

        return [null => 'Выберите категорию'] + $categories->toArray();
    }

    // has many channels
    public function channels() {
        return $this->hasMany(Channel::class);
    }
}
