<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/25 下午3:13
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
namespace Houdunwang\Laravel;
use Illuminate\Support\Facades\Facade;
/**
 * Class Facade
 *
 * @package Houdunwang\Module
 */
class Factory extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'HDModule';
    }
}