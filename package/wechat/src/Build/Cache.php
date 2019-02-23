<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/29 下午4:04
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Houdunwang\WeChat\Build;

use Exception;

/**
 * 文件缓存处理
 * Class File
 *
 * @package houdunwang\cache\build
 */
class Cache
{
    //缓存目录
    private $dir;

    //设置缓存目录
    public function dir($dir)
    {
        $this->dir = $dir;
        $status = is_dir($dir) or mkdir($dir, 0755, true);
        if ( ! $status) {
            throw new Exception("缓存目录创建失败或目录不可写");
        }

        return $this;
    }

    //缓存文件
    private function getFile($name)
    {
        return $this->dir.'/'.md5($name).".php";
    }

    //设置
    public function set($name, $data, $expire = 3600)
    {
        $file = $this->getFile($name);
        //缓存时间
        $expire = sprintf("%010d", $expire);
        $data   = $expire.serialize($data);

        return file_put_contents($file, $data);
    }

    //获取
    public function get($name)
    {
        $file = $this->getFile($name);
        //缓存文件不存在
        if ( ! is_file($file) || ! is_readable($file)) {
            return null;
        }
        $content = file_get_contents($file);
        $expire  = intval(substr($content, 0, 10));
        //修改时间
        $mtime = filemtime($file);

        //缓存失效处理
        if ($expire > 0 && $mtime + $expire < time()) {
            if (is_file($file)) {
                unlink($file);
            }

            return false;
        }

        return unserialize(substr($content, 10));
    }

    //删除
    public function del($name)
    {
        $file = $this->getFile($name);

        return @unlink($file);
    }

    //刷新缓存池
    public function flush($dir)
    {
        if ( ! is_dir($this->dir)) {
            return true;
        }
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->flush("$dir/$file")
                : unlink("$dir/$file");
        }

        return rmdir($dir);
    }
}
