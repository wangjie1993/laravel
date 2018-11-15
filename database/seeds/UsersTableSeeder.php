<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();
        //修改第一个数据为正式数据
           $user =\App\User::find(1);
        $user->name = '李斌';
        $user->email = '332171306@qq.com';
        $user->password = bcrypt('654321');
        $user->is_admin = true;
        $user->save();

    }
}
