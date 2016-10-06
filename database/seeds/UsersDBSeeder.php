<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        App\User::create(['email' => 'owner@owner.com',
            'first_name' => 'Elwin',
            'last_name'  => 'Pa6',
            'phone' => '7897787088',
            'password' => Hash::make('owner')]);

        App\User::Create([
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'email'=>'admin@admin.com',
            'phone' => '7897187888',
            'password'=>Hash::make('admin')
        ]);


        App\User::create([
            'first_name' => 'Manzi',
            'last_name'  => 'Prince',
            'phone' => '7897787883',
            'email'=>'staff@staff.com',
            'password'=>Hash::make('staff')
        ]);

        App\User::create([
            'first_name' => 'XXXX',
            'last_name'  => 'YYYY',
            'phone' => '7897787888',
            'email'=>'driver@driver.com',
            'password'=>Hash::make('driver')
        ]);

        App\User::create([
            'first_name' => 'Sam',
            'last_name'  => 'Sakam',
            'email'=>'manager@admin.com',
            'password'=>Hash::make('manager')
        ]);
    }
}
