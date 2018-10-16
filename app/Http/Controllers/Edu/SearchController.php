<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Edu;

use App\Models\Article;
use App\Models\EduTopic;
use App\Models\EduVideo;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function lists(Request $request)
    {
        $w = $request->query('w');
        switch ($request->query('t')) {
            case 'article':
                $data = Article::search($w)->paginate(10);
                break;
            case 'topic':
                $data = EduTopic::search($w)->paginate(10);
                break;
            case 'video':
                $data = EduVideo::search($w)->paginate(10);
                break;
            default:
                return back()->with('error', '类型错误');
        }
        return view('edu.search_lists', compact('data'));
    }
}
