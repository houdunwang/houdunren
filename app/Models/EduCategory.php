<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 话题分类
 * Class EduCategory
 * @package App\Models
 */
class EduCategory extends Model
{
    protected $fillable = ['title', 'description', 'icon'];

    public function topic()
    {
        return $this->hasMany(EduTopic::class, 'category_id');
    }
}
