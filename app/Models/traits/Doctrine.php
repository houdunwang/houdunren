<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午5:06
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace App\Models\traits;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

trait Doctrine
{
    public function getDoctrineConnection()
    {
        $config           = new Configuration();
        $connectionParams = [
            'dbname'   => config('database.connections.mysql.database'),
            'user'     => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
            'host'     => config('database.connections.mysql.host'),
            'driver'   => 'pdo_mysql',
            'charset'  => config('database.connections.mysql.charset'),
        ];

        return DriverManager::getConnection($connectionParams, $config);
    }

    public function listTableColumns()
    {
        return $this->getDoctrineConnection()->getSchemaManager()->listTableColumns($this->getTable());
    }

}
