<?php

use Illuminate\Database\Seeder;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CreditCard::firstOrCreate([
            'id' => '1',
            'customer_id' => '1',
            'number' => '12345',
            'expire' => '03/04/2020',
            'brand' => 'GTB'
        ]);

        \App\CreditCard::firstOrCreate([
            'id' => '2',
            'customer_id' => '1',
            'number' => '56789',
            'expire' => '03/04/2020',
            'brand' => 'Diamond'
        ]);

        \App\CreditCard::firstOrCreate([
            'id' => '3',
            'customer_id' => '2',
            'number' => '23509',
            'expire' => '03/04/2020',
            'brand' => 'Access'
        ]);

        \App\CreditCard::firstOrCreate([
            'id' => '4',
            'customer_id' => '2',
            'number' => '38931',
            'expire' => '03/04/2020',
            'brand' => 'Zenith'
        ]);
    }
}
