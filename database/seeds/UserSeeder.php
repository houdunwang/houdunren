<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class, 30)->create();
        $users[0]['name'] = '向军大叔';
        $users[0]['email'] = '2300071698@qq.com';
        $users[0]['is_admin'] = true;
        $users[0]->save();
    }
}
