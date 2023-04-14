<?php

namespace App\Http\Middleware;

use App\Services\ModuleService;
use Closure;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Config;
use Symfony\Component\HttpFoundation\Response;

//模块中间件
class ModuleMiddleware
{
    public function handle(Request $request, Closure $next, string $module): Response
    {
        config(['module' => app(ModuleService::class)->config($module)]);
        return $next($request);
    }
}
