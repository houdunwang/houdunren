<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Config;
use Symfony\Component\HttpFoundation\Response;

//模块中间件
class ModuleMiddleware
{
    public function handle(Request $request, Closure $next, string $module): Response
    {
        config(['module' => include base_path() . '/Modules/' . $module . '/Config/config.php']);
        $this->load();
        return $next($request);
    }

    protected function load()
    {
        $data = Config::find(1)?->value('data');
        if ($data) {
            foreach (config('module') as $name => $value) {
                if (is_string($value)) {
                    config(['module' . $name => $data[$name] ?? $value]);
                } else {
                    config(['module.' . $name => ($data[$name] ?? []) + $value]);
                }
            }
        }
    }
}
