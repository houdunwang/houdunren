<?php

namespace Modules\Article\Observers;

use Modules\Article\Entities\Category;
use DB;
use Log;

/**
 * 栏目
 * @package Modules\Article\Observers
 */
class CategoryObserver
{
    public function creating(Category $category)
    {
    }

    public function created(Category $category)
    {
        $parent = $category->parent;
        DB::table('article_categories')->where('id', $category->id)->update([
            'path' => ($parent ? $parent->path : 0) . '-' . $category->id
        ]);
    }

    public function updating(Category $category)
    {
        //修改栏目PATH
        $parent = $category->parent;
        $category['path'] = ($parent ? $parent->path : 0) . '-' . $category->id;
        //修改子栏目PATH
        $category->childrens->map(function ($child) use ($category) {
            DB::table('article_categories')->where('id', $child['id'])->update([
                'path' => preg_replace('/.+\-' . $category->id . '\-/', $category->path . '-', $child['path'])
            ]);
        });
    }

    public function updated(Category $category)
    {
    }

    public function deleted(Category $category)
    {
        $category->contents()->delete();
    }
}
