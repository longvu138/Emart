<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // gọi seeder user vừa tạo
        $this->call(UserTableSeeder::class);
        // gọi đếm factory tạo 50 người dùng
        \App\Models\User::factory(50)->create();
        \App\Models\Category::factory(50)->create();
        \App\Models\Banner::factory(50)->create();
        \App\Models\Brand::factory(10)->create();

    }
}
