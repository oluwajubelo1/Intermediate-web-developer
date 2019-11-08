<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrCreate([
            'id' => '1',
            'firstname' => 'Oluwasegun',
            'lastname' => 'Ige',
            'email' => 'igeoluwasegun363@gmail.com',
            'phone' => '07082528923',
            'dob' => '06-06-1991',
            'password' => bcrypt('00000000'),
            'role' => 'admin'
        ]);

        \App\User::firstOrCreate([
            'id' => '2',
            'firstname' => 'Goke',
            'lastname' => 'Adeyemi',
            'email' => 'adeyemigoke@gmail.com',
            'phone' => '07082528093',
            'dob' => '10-11-2001',
            'password' => bcrypt('00000000'),
            'role' => 'customer'
        ]);
    }
}
