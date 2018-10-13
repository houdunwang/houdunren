<?php

namespace App\Http\Controllers\Content\System;

use Blade;

/**
 * 自定义指令
 * Class Tag
 * @package App\Http\Controllers\Content\System
 */
class Tag
{
    protected $directives = ['lists'];

    public function make()
    {
        array_map(function ($directive) {
            $this->$directive();
        }, $this->directives);
    }

    protected function lists()
    {
        Blade::directive('list', function ($expression) {
            $expression = $expression ?? '[]';
            $php = <<<str
<?php
\$params = $expression;
\$db = \App\Models\ContentArticle::where('id','>',0);
if(isset(\$params['cid'])){
    \$db->where('category_id',\$params['cid']);
}
foreach(\$db->get() as \$hdcms):
\$hdcms['url'] = route('content.list',\$hdcms);
?>
str;
            return $php;
        });
        Blade::directive('endlist', function ($expression) {
            return <<<str
<?php endforeach;?>
str;
        });
    }
}