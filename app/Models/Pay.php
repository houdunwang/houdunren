<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 支付定单
 * Class Pay
 * @package App\Models
 */
class Pay extends Model
{
    protected $fillable = ['site_id', 'module_id', 'status', 'alipay_trade_no', 'user_id', 'subject', 'sn','price'];

    /**
     * 支付关联模型
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function relation()
    {
        return $this->morphTo('pay');
    }

    /**
     * 根据定单号查找
     * @param $query
     * @param $sn
     * @return mixed
     */
    public function scopeSn($query, $sn)
    {
        return $query->where('sn', $sn);
    }
}
