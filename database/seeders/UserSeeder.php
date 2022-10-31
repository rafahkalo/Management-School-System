<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Nette\Utils\Random;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$faker=\Faker\Factory::create();
        //Faker::Date.between(from:'1990/01/01',to:'2005/01/01');

for($i=0;$i<20;$i++){
    $g=$faker->randomElement(['male','female']);
        DB::table('users')->insert([

                //
                'first_name'=>$faker->name,
                'last_name'=>$faker->name,
                'email'=>$faker->safeEmail.'@gmail.com',
                'image'=>$faker->image('public/student_image',640,480,null,false),
                'sex'=>$g,
                'number'=>$faker->phoneNumber,
                'role_id'=>$faker->randomElement([1,2]),
               // 'birthday'=>unique()->dateTimeBetween($startDate = '-10 years',$endDate='now')

        ]);
    }
    }
}
