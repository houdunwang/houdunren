<?php
namespace Modules\{MODULE_NAME}\Entities;

use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;

/**
 * {MODEL_TITLE}
 * Class {MODEL_CLASS}
 * @package Modules\Edu\Entities
 */
class {MODEL_CLASS} extends Model
{
    use Site;
    protected $fillable = [{FILLABLE}];
    /**
     * 内容标题
     */
    public function getTitle()
    {
    }
    /**
     * 前台显示链接
     */
    public function getLink()
    {
    }
}
