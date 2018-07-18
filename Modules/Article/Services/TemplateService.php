<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/18 下午8:47
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Modules\Article\Services;

class TemplateService
{
    public function all()
    {
        $dirs = glob(public_path('templates/*'));
        $configs = [];
        foreach ($dirs as $dir) {
            if ($config = $this->parsePackage($dir)) {
                $configs[] = $config;
            }
        }

        return $configs;
    }

    protected function parsePackage($dir)
    {
        $file = $dir.'/package.json';
        if (is_file($file)) {
            $jsonContent = file_get_contents($file);
            $config      = json_decode(trim($jsonContent));
            if (is_object($config)) {
                $config            = (array)$config;
                $config['preview'] = url('templates/'.basename($dir).'/'.$config['preview']);
                $config['name']    = basename($dir);

                return $config;
            }
        }
    }
}
