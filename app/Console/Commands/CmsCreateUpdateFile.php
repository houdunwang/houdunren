<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * 生成更新包
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
        \Storage::disk('base')->makeDirectory('updateLists');
        $files = $this->format($files);
        if (!empty($files)) {
            $build = time();
            put_contents_file("updateLists/{$build}.php",[
                'build' => $build,
                'total' => count($files),
                'logs' => $logs,
                'files' => $files,
            ]);
            put_contents_file('version.php',['build'=>$build]);
        }
    }

    /**
     * 写入文件
     * @param string $file
     * @param array $data
     * @return bool|int
     */
    protected function filePutContent(string $file, array $data)
    {
        $content = '<?php return ' . var_export($data, true) . ';';
        return file_put_contents($file, $content);
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
