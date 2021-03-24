<?php

namespace Modules\Article\Services;

use Illuminate\Support\Facades\Blade;
use InvalidArgumentException;
use Modules\Article\Entities\Swiper;

/**
 * 扩展Blade标签
 * @package Modules\Article\services
 */
class BladeService
{
    /**
     * 标签声明
     * @var string[]
     */
    protected $blades = ['swiper', 'hd', 'endhd'];

    /**
     * 注册标签
     * @return void
     */
    public function register()
    {
        foreach ($this->blades as $blade) {
            $this->$blade();
        }
    }

    /**
     * 万能查询标签
     * @return void
     * @throws InvalidArgumentException
     */
    protected function hd()
    {
        Blade::directive('hd', function ($expression) {
            $args = $this->getArgs($expression);
            return <<<html
            <?php
                \$_exp = {$args['exp']};
                foreach(\$_exp as \$field):
            ?>
html;
        });
    }

    /**
     * 万能查询标签结束
     * @return void
     * @throws InvalidArgumentException
     */
    protected function endhd()
    {
        Blade::directive('endhd', function ($expression) {
            return <<<html
            <?php
        endforeach;
            ?>
html;
        });
    }

    /**
     * 轮换图
     * @return void
     * @throws InvalidArgumentException
     */
    protected function swiper()
    {
        Blade::directive('swiper', function ($expression) {
            $args = $this->getArgs($expression);
            return <<<html
            <?php
                \$swiper = \Modules\Article\Entities\Swiper::where('site_id', site('id'))->find({$args['id']});
                echo view('article::directives.swiper', ['swiper'=>\$swiper]);
            ?>
html;
        });
    }

    /**
     * 获取标签参数
     * @param mixed $expression
     * @return array
     */
    protected function getArgs($expression)
    {
        $args = [];
        preg_match_all('/(\w+)=([\'"])(.+?)\2/', $expression, $arguments, PREG_SET_ORDER);
        foreach ($arguments as $exp) {
            $args[$exp[1]] = $exp[3] ?? '';
        }
        return $args;
    }
}
