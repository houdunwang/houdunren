<?php

namespace App\Http\Middleware;

use Closure;

class BindMobileMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if ($route = $this->bindCheck()) {
      return redirect($route);
    }
    return $next($request);
  }

  protected function bindCheck()
  {
    $user = auth()->user();
    foreach (['mobile', 'email'] as $field) {
      if ($user && $this->checkBindField($field) && !$user[$field]) {
        return route("member.{$field}.create");
      }
    }
  }

  protected function checkBindField($field)
  {
    return in_array($field, config('site.user.bind.value', []));
  }
}
