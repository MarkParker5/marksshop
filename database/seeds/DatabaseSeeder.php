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
        factory(App\Category::class, 0)->create();
        factory(App\Product::class, 0)->create();
        factory(App\User::class, 1)->create();
        factory(App\Review::class, 0)->create();
    }
}
//> php artisan migrate:refresh --seed
//> php artisan make:model [name] -mfc         //model +migration+factory+controller