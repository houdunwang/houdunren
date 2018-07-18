<?php

namespace Modules\Admin\Entities;

use App\Exceptions\InvalidException;
use Illuminate\Database\Eloquent\Model;
use DB;

class Module extends Model
{
    protected $fillable = ['title', 'name', 'is_default', 'front_access'];

    public function setDefault()
    {
        if($this->front_access==0){
            throw new InvalidException('不允许设置');
        }
        DB::table('modules')->update(['is_default' => 0]);
        $this->is_default = 1;

        return $this->save();
    }

    public function getDefaultModule()
    {
        $module = $this->where('is_default', 1)->where('front_access',1)->first();

        return $module ? $module['name'] : 'Article';
    }
}
