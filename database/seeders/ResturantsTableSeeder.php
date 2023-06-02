<?php

namespace Database\Seeders;

use App\Models\Resturant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResturantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Resturant::truncate();
        Resturant::create([
            'name'=>'مطعم التايلندي',
            'email'=>'resturant@resturant.com',
            'password'=>Hash::make('123456'),
            'description'=>'مطعم التايلندي لجميع أنواع المأكولات',
            'mobile'=>'0594015222',
            'telephone'=>'08217620',
            'address'=>'بالقرب من مستشفى الشفاء',
            'confirm'=>'avatar.png',
            'is_confirm'=>true
        ]);
    }
}
