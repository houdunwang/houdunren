<?php

namespace App\Http\Controllers\Front;

use App\Exceptions\ResponseHttpException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 点赞管理
 * Class FavourController
 * @package App\Http\Controllers\Common
 */
class FavourController extends Controller
{

    /**
     * 点赞操作
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
            $favour = $model->favour()->where($params)->first();
            $favour ? $favour->delete() : $model->favour()->create($params);

            call_user_func([$model,'favourUpdate']);
            return back()->with('success', $favour ? '取消成功' : '点赞成功');
        } catch (\Exception $exception) {
            throw new ResponseHttpException($exception->getMessage());
        }
    }
}
