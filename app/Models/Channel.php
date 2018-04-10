<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

/**
 * Class Channel
 * @package App\Models
 * @version April 8, 2018, 5:48 am UTC
 *
 * @property string title
 * @property string name
 * @property integer type_id
 * @property integer category_id
 * @property string avatar
 * @property string description
 * @property string keywords
 * @property string og_description
 * @property string status
 * @property timestamp published_at
 * @property integer members_count
 * @property string telegram_id
 * @property string telegram_type
 * @property integer author_id
 * @property integer moder_id
 */
class Channel extends Model
{
    use SoftDeletes;
    use HasTags;

    public $table = 'channels';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'name',
        'type_id',
        'category_id',
        'avatar',
        'description',
        'keywords',
        'og_description',
        'status',
        'published_at',
        'members_count',
        'telegram_id',
        'telegram_type',
        'author_id',
        'moder_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'name' => 'string',
        'type_id' => 'integer',
        'category_id' => 'integer',
        'avatar' => 'string',
        'description' => 'string',
        'keywords' => 'string',
        'og_description' => 'string',
        'status' => 'string',
        'members_count' => 'integer',
        'telegram_id' => 'string',
        'telegram_type' => 'string',
        'author_id' => 'integer',
        'moder_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'name' => 'required|unique:channels',
        // 'type_id' => 'required',
        'category_id' => 'required',
        'avatar' => 'required',
        'description' => 'required',
        // 'keywords' => 'sometimes',
        // 'og_description' => 'sometimes',
        // 'status' => 'sometimes',
        // 'published_at' => 'required',
        'members_count' => 'required',
        'telegram_id' => 'required',
        'telegram_type' => 'required',
        // 'author_id' => 'required',
        // 'moder_id' => 'required'
    ];


    /**
     * Constants
     *
     */

    public const DEFAULT_IMAGE = 'default.png';
    public const IMAGE_PUBLIC_DIR = 'images/channels/';
    public const IMAGE_PUBLIC_TMP_DIR = 'images/channels/tmp/';
    
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_DECLINED = 'declined';

    // published
    public function scopePublished($query) {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    // under moderation
    public function scopeUnderModeration($query) {
        return $query->where('status', self::STATUS_DRAFT);
    }

    public static function hasUnderModeration() {
        return self::underModerationCount() > 0;
    }

    public static function underModerationCount() {
        return self::underModeration()->count();
    }

    // author
    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }
}
