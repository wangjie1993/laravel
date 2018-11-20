<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['英雄联盟','绝地求生','穿越火线','刺激战场'] as $v){
            DB::table('categories')
                ->insert([
                    'title'=>$v,
                    'icon' => 'fa fa-bar-chart-o',
                ]);
        }
    }
}
