<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * 生成CMS更新包
 * Class CmsUpdateZip
 * @package App\Console\Commands
 */
class CmsCreateUpdateFile extends Command
{
    protected $signature = 'cms:create-update-file';
    protected $description = '创建CMS更新包';

    public function handle()
    {
        exec("git diff master dev --name-status", $files);
        exec('git log dev ^master --pretty=format:"%s"', $logs);
        $files = $this->format($files);
//        if (!empty($files)) {
            $build = time();
            file_put_contents('updateLists/'.$build.'.php', '<?php return ' . var_export([
                    'build' => $build,
                    'total' => count($files),
                    'logs' => $logs,
                    'files' => $files,
                ], true) . ';');
//        }
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
            }
        }
        return $format;
    }
}
