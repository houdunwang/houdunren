<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * 生成CMS更新包
 * Class CmsUpdateZip
 * @package App\Console\Commands
 */
class CmsUpdateZip extends Command
{
    protected $signature = 'cms:update-zip';
    protected $description = '创建CMS更新包';

    public function handle()
    {
        exec("git diff master dev --name-status", $files);
        $files = $this->format($files);
        if (!empty($files)) {
            file_put_contents('version.php',[
                'build'=>time(),
                'files'=>$files
            ]);
            return;
            $zipper = new \Chumper\Zipper\Zipper();
            foreach ($files as $file => $tag) {
                $zipper->make('/Users/xj/Desktop/hdCms.zip')->add($file, $file);
            }
        }
    }

    /**
     * 格式化文件数据移除不存在的文件
     * @param array $files
     * @return array
     */
    protected function format(array $files): array
    {
        $format = [];
        foreach ($files as $k => $f) {
            preg_match('/\w+\s+([^\s]+)/', $f, $file);
            if (is_file($file[1])) {
                $format[$file[1]] = in_array($file[0], ['A', 'M']) ? $file[0] : 'M';
            } else {
                $format[$file[1]] = 'D';
            }
        }
        return $format;
    }
}
