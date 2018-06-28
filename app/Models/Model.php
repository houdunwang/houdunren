<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午5:09
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace App\Models;

use App\Models\traits\Doctrine;
use \Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use Doctrine;
}