<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'firstname' => 'Julien',
            'lastname' => 'Boyer',
            'active' => 1,
            'expiration_date' => new \DateTime('+ 1 year'),
            'description' => 'Seed User',
            'email' => 'administrators@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
