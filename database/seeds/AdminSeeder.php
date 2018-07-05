<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class, 6)->create();
        $user           = Admin::find(1);
        $user->name     = 'admin';
        $user->nickname = '向军大叔';
        $user->save();
        \Spatie\Permission\Models\Role::create(['name'=>'webmaster','title'=>'站长','guard_name'=>'admin']);
        $user->syncRoles(['webmaster']);
    }
}
