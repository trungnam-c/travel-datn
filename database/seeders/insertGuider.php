<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class insertGuider extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstName = ['Thạch', 'Hòa', 'Phương', 'An', 'Sơn', 'Long', 'Phước', 'Quý', 'Tuân'];
        $lastName = ['Huỳnh', 'Trần', 'Phan', 'Đỗ', 'Phùng', 'Nguyễn'];
        $midName = ['Minh', 'Khánh', 'Lê', 'Kim', 'Hoàng'];
        $boolean = [1, 0];
        for($i = 0; $i < 20; $i++) {
           DB::table('travel_guider')->insert([
                ['guider_name'=>$lastName[array_rand($lastName)] . " " . $midName[array_rand($midName)] . " " . $firstName[array_rand($firstName)], 'guider_gender'=>1, 'guider_address'=> 'Công viên phần mềm Quang Trung, Q.12, TP.Hồ Chí Minh, Việt Nam', 'guider_phone'=>'0123456789','guider_status'=>1],
            ]); 
        }
    }
}
