<?php

namespace App;

use App\Models\Pay;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['sn', 'subject', 'price'];

    //支付成功调用，在这里改变定单状态
    public function success()
    {
        $this['status'] = true;
        $this->save();
    }

    /**
     * 系统支付关联用于获取商品的支付信息
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function pay()
    {
        return $this->morphMany(Pay::class, 'pay');
    }

    //商品定单号
    public function sn()
    {
        return $this['sn'];
    }

    //商品价格
    public function price()
    {
        return $this['price'];
    }

    //商品名称
    public function subject()
    {
        return $this['subject'];
    }

    //商品链接
    public function link()
    {
        return route('system.site.index');
    }
}
