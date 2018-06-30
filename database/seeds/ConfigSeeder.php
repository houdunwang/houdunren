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
                ["key"=>"name","value"=>"HDCMS","title"=>"网站名称","group"=>"site"],
                ["key"=>"keywords","value"=>"HDCMS,后盾人","title"=>"网站关键字","group"=>"site"],
                ["key"=>"descriptions","value"=>"后盾人 人人做后盾","title"=>"网站描述","group"=>"site"],
                ["key"=>"icp","value"=>"京Qxxxxxxx","title"=>"ICP备案号","group"=>"site"],
                ["key"=>"tel","value"=>"010-86467608","title"=>"客服电话","group"=>"site"],
                ["key"=>"email","value"=>"站点邮箱","title"=>"2300071698@qq.com","group"=>"site"],
        ];
        foreach($configs as $config){
            \App\Models\Config::create($config);
        }
    }
}
