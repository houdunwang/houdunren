<?php

namespace Modules\Edu\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site;

/**
 * 标签管理
 * @package Modules\Edu\Entities
 */
class Tag extends BaseModel
{
    protected $table = 'edu_tag';

    protected $fillable = ['title', 'site_id'];

    /**
     * 删除站点所有标签
     *
     * @param Site $site
     * @return void
     */
    public static function deleteBySite(Site $site)
    {
        return self::where('site_id', $site['id'])->delete();
    }
}
