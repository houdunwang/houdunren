<?php

use Illuminate\Database\Seeder;

class EduShopSeeder extends Seeder
{
    public function run()
    {
        $shops = [
            [
                'title' => '半年付',
                'price' => 499,
                'icon' => 'fa fa-desktop',
                'description' => '小试牛刀',
                'buy_month' => 6,
                'status' => 1,
            ],
            [
                'title' => '一年付',
                'price' => 745,
                'icon' => 'fa fa-diamond',
                'description' => '利用一年时间提升段位',
                'buy_month' => 12,
                'status' => 1,
            ],
            [
                'title' => '两年付',
                'price' => 1210,
                'icon' => 'fa fa-shopping-cart',
                'description' => '成为技术大牛',
                'buy_month' => 24,
                'status' => 1,
            ],
            [
                'title' => '终身会员',
                'price' => 2470,
                'icon' => 'fa fa-empire',
                'description' => '忠实粉丝成就最强王者',
                'buy_month' => 500,
                'status' => 1,
            ],
        ];
        foreach ($shops as $shop) {
            \App\Models\EduShop::create($shop);
        }
    }
}
