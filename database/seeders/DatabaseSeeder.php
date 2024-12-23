<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\Subcat;
use App\Models\Product;
use App\Models\Seller;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(5)->create();
        Cart::Factory(5)->sequence(['user_id' => 1], 
                                        ['user_id' => 2], 
                                        ['user_id' => 3], 
                                        ['user_id' => 4],
                                        ['user_id' => 5])->create();
        Seller::factory(5)->create();
        Cat::Factory(4)->create();
        Subcat::Factory(15)->create();
        Product::Factory(40)->sequence(
            ['discount_price' => fake()->randomFloat($nbMaxDecimals = 5, $min = 30, $max = 60), 'image' => 'GreenAbstract.jpg'],
            ['image' => 'GreenAbstract.jpg'],
            ['discount_price'=> fake()->randomFloat($nbMaxDecimals = 5, $min = 30, $max = 60), 'image' => 'Ivywalltexture.jpg'])->create();
    }
}
