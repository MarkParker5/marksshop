<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        // $this->call(UserSeeder::class);
        factory(App\Category::class, 4)->create();
        factory(App\Product::class, 180)->create();
        factory(App\User::class, 10)->create();
        factory(App\Review::class, 100)->create();
    }
}
//> php artisan migrate:refresh --seed
//> php artisan make:model [name] -mfc         //model +migration+factory+controller