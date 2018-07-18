<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/17 上午9:57
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace App\Services;

use HDModule;
use Modules\Admin\Entities\Module;

class ConfigService
{
    public function save(array $data = [])
    {
        $module = HDModule::currentModule();
        $config = array_merge(HDModule::config($module.'.config'), $data);
        $file   = HDModule::getModulePath().'/Config/config.php';

        return file_put_contents($file, '<?php return '.var_export($config, true).';');
    }
}
