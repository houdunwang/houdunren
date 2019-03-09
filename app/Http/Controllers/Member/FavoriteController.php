<?php

namespace App\Http\Controllers\Member;

use App\Exceptions\ResponseHttpException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 收藏管理
 * Class favoriteController
 * @package App\Http\Controllers\Common
 */
class FavoriteController extends Controller
{
    /**
     * 收藏操作
     * @param $model
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws ResponseHttpException
     */
    public function make($model, int $id)
    {
        try {
            $model = '\\' . str_replace('-', '\\', $model);
            $model = app($model)->findOrFail($id);
            $params = [
                'site_id' => \site()['id'],
                'module_id' => \module()['id'],
                'user_id' => auth()->id(),
            ];
            $favorite = $model->favorite()->where($params)->first();
            $favorite ? $favorite->delete() : $model->favorite()->create($params);

            call_user_func([$model, 'favoriteUpdate']);
            if (\request()->expectsJson()) {
                return response()->json($favorite ?
                    ['message' => '收藏成功', 'action' => "add", "total" => $model->favoriteCount()] :
                    ['message' => '取消成功', 'action' => 'del', "total" => $model->favoriteCount()]);
            } else {
                return back()->with('success', $favorite ? '取消成功' : '收藏成功');
            }
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }
}
