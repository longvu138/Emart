<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            // admin
            [
                'full_name'=>'admin',
                'username'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('123456'),
                'role'=>'admin',
                'status'=>'active',
            ],
            // vendor
            [
                'full_name'=>'vendor',
                'username'=>'vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make('123456'),
                'role'=>'vendor',
                'status'=>'active',
            ],

            // customer
            [
                'full_name'=>'customer',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('123456'),
                'role'=>'customer',
                'status'=>'active',
            ]
            ]);
    }
}
