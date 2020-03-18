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
      1 => ['name' => 'admin', 'nickname' => '超管',],
      2 => ['name' => 'houdunren', 'nickname' => '后盾人',],
      3 => ['name' => 'hdcms', 'nickname' => 'HDCMS开源软件'],
    ];
    collect([1, 2, 3])->map(function ($id) use ($users) {
      $user = User::find($id);
      $user->fill($users[$id])->save();
    });
  }
}
