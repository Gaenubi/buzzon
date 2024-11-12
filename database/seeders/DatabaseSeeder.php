<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cat;
use App\Models\Subcat;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       
        Cat::Factory(3)->create();
        Subcat::Factory(10)->create();
        Product::Factory(20)->green()->create();
        Product::Factory(20)->ivy()->create();
    }
}
