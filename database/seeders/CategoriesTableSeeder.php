<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        Category::create([
            'name'=>'أسماك',
            'description'=>'أسماك',
        ]);
        Category::create([
            'name'=>'لحوم',
            'description'=>'لحوم',
        ]);
        Category::create([
            'name'=>'سلطات',
            'description'=>'سلطات',
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
