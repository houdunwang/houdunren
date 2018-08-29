<?php
/**
 * Created by PhpStorm.
 * User: xj
 * Date: 2018/8/26
 * Time: 11:14 PM
 */

namespace App\Servers;

use App\Models\Config;

class ConfigServer
{
    public function get($name)
    {
        return Config::firstOrNew(['name' => $name]);
    }

    public function save(string $name, array $data)
    {
        return Config::updateOrCreate(['name' => $name], ['name' => $name, 'data' => $data]);
    }
}
