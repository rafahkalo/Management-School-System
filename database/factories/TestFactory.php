<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker=\Faker\Factory::create();
        $g=$faker->randomElement(['male','female']);
        return [
            //
            'first_name'=>$faker->name,
            'last_name'=>$faker->name,
            'email'=>$faker->safeEmail.'@gmail.com',
            'image'=>$faker->image('public/student_image',640,480,null,false),
            'sex'=>$g,
            'number'=>$faker->phoneNumber,
            'role_id'=>$faker->randomElement([1,2])
        ];
    }
}
