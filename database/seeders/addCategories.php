<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class addCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travel_categories')->insert([
            ['cate_name'=> 'Miền Nam', 'cate_image'=>'images.jpg', 'cate_hide/show'=> 1],
            ['cate_name'=> 'Miền Bắc', 'cate_image'=>'images.jpg', 'cate_hide/show'=> 1],
            ['cate_name'=> 'Miền Trung', 'cate_image'=>'images.jpg', 'cate_hide/show'=> 1],
            ['cate_name'=> 'Miền Tây', 'cate_image'=>'images.jpg', 'cate_hide/show'=> 1],
        ]);
    }
}
