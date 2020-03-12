<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    factory(User::class, 20)->create()->each(function ($user) {
      $user->group()->attach([1]);
    });
    $users = [
      1 => ['name' => 'admin', 'nickname' => '超管', 'email' => '2300071698@qq.com', 'mobile' => '17777777777'],
      2 => ['name' => 'houdunren', 'nickname' => '后盾人', 'email' => '35288551@qq.com', 'mobile' => '18888888888'],
      3 => ['name' => 'hdcms', 'nickname' => 'HDCMS开源软件', 'email' => '931241005@qq.com', 'mobile' => '19999999999'],

    ];
    collect([1, 2, 3])->map(function ($id) use ($users) {
      $user = User::find($id);
      $user->fill($users[$id])->save();
    });
  }
}
