<?php
namespace App\Tables\ArticleCategory;

use Houdunwang\LaravelView\BaseHandle;
use App\ArticleCategory;

class ArticleCategoryHandle extends BaseHandle{

    //允许处理字段
    protected $allowFields = ['title','pid','description','pic','datetime','date'];

    public function __construct(ArticleCategory $ArticleCategory)
    {
        parent::__construct($ArticleCategory);
    }
    public function _pid()
    {
        $data = [];
        foreach ($this->model->get() as $cat) {
            $data[]=[
                //option文本描述
                'title'=>$cat['title'],
                //options值
                'value'=>$cat['id'],
                //选中的选项
                'selected'=>$this->model->pid ==$cat['id'],
                //不允许选择自身
                'disabled'=>$this->model->id == $cat['id']
            ];
        }
        return ['title'=>'修改栏目标题','options'=>$data];
    }
}
