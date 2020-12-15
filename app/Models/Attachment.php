<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attachment
 *
 * @property int $id
 * @property string $path 文件路径
 * @property string $name 文件名
 * @property string|null $extension 扩展名
 * @property int $user_id
 * @property int $size 文件大小
 * @property int|null $site_id
 * @property int|null $module_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereSiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attachment whereUserId($value)
 * @mixin \Eloquent
 */
class Attachment extends Model
{
    protected $fillable = ['path', 'user_id', 'name', 'extension'];
}
