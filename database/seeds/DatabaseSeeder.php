<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //系统核心
        $this->call(UserSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(RoleSeeder::class);

        //文章系统
        $this->call(ContentModelSeeder::class);
        $this->call(ContentCategorySeeder::class);
        $this->call(ContentArticleSeeder::class);
        $this->call(ContentSlideSeeder::class);

        //在线教育
        $this->call(EduCategorySeeder::class);
        $this->call(EduTopicSeeder::class);
        $this->call(EduTagSeeder::class);
        $this->call(EduShopSeeder::class);
    }
}
