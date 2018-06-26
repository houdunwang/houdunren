<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
                ["key"=>"name","value"=>"HDCMS","title"=>"网站名称","group"=>"site","form_type"=>"text"],
                ["key"=>"keywords","value"=>"HDCMS,后盾人","title"=>"网站关键字","group"=>"site","form_type"=>"text"],
                ["key"=>"descriptions","value"=>"后盾人 人人做后盾","title"=>"网站描述","group"=>"site","form_type"=>"text"],
                ["key"=>"icp","value"=>"京Qxxxxxxx","title"=>"ICP备案号","group"=>"site","form_type"=>"text"],
                ["key"=>"tel","value"=>"010-86467608","title"=>"客服电话","group"=>"site","form_type"=>"text"],
                ["key"=>"email","value"=>"站点邮箱","title"=>"2300071698@qq.com","group"=>"site","form_type"=>"text"],
                ["key"=>"logo","value"=>"org/beagle/img/logo-xx.png","title"=>"网站LOGO","group"=>"site","form_type"=>"image"],
        ];
        foreach($configs as $config){
            \App\Models\Config::create($config);
        }
    }
}
