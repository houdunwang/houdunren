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
            1 => ['name' => '超管', 'email' => 'admin@houdunren.com', 'is_super_admin' => true],
            2 => ['name' => '后盾人', 'email' => 'houdunren@houdunren.com'],
            3 => ['name' => 'HDCMS', 'email' => 'hdcms@houdunren.com'],
        ];
        collect([1, 2, 3])->map(function ($id) use ($users) {
            $user = User::find($id);
            $user->fill($users[$id])->save();
        });
    }
}
