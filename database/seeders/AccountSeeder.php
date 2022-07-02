<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Models\Account;
use Faker\Factory;
use Illuminate\Support\Str;

class AccountSeeder extends BaseSeeder
{
    public function run()
    {
        $faker = Factory::create();

        Account::truncate();

        $files = $this->uploadFiles('accounts');

        Account::create([
            'first_name'   => $faker->firstName,
            'last_name'    => $faker->lastName,
            'email'        => 'agent@thesky9.com',
            'username'     => 'thesky9',
            'password'     => bcrypt('12345678'),
            'dob'          => $faker->dateTime,
            'phone'        => $faker->e164PhoneNumber,
            'description'  => $faker->realText(30),
            'credits'      => 10,
            'confirmed_at' => now(),
            'avatar_id'    => $files[0]['data']->id,
            'personal_img' => $files[0]['data']->id,
            'national_image_front'    => $files[0]['data']->id,
            'national_image_back' => $files[0]['data']->id,
        ]);
        for ($i = 1; $i < 10; $i++) {
            Account::create([
                'first_name'   => $faker->firstName,
                'last_name'    => $faker->lastName,
                'email'        => $faker->email,
                'username'     => Str::slug($faker->unique()->userName),
                'password'     => bcrypt($faker->password),
                'dob'          => $faker->dateTime,
                'phone'        => $faker->e164PhoneNumber,
                'description'  => $faker->realText(30),
                'credits'      => $faker->numberBetween(1, 10),
                'confirmed_at' => now(),
                'avatar_id'    => $files[$i]['data']->id,
                'personal_img' => $files[$i]['data']->id,
                'national_image_front' => $files[$i]['data']->id,
                'national_image_back' => $files[$i]['data']->id,
            
            ]);
        }
    }
}
