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
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ContentModelSeeder::class);
        $this->call(ContentCategorySeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ContentSlideSeeder::class);
    }
}
