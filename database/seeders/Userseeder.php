<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'=>'Vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make('Vendor@1234'),
                'role'=>'vendor',
                'phone'=>'8233130166',
                'wallet'=>0
            ],

            [
                'name'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('Customer@1234'),
                'role'=>'customer',
                'phone'=>'8233130666',
                'wallet'=>rand(1000,40000)
            ],

        ]);
    }
}
