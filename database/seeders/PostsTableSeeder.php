<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 1000; $i++){
 
    		DB::table('posts')->insert([
    			'title' => $faker->jobTitle,
    			'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    		]);
 
    	}
    }
}