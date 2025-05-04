<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Women Casual Sandals',
                'description' => 'Comfortable flat sandals perfect for everyday wear.',
                'price' => 1499.00,
                'size' => '6',
                'color' => 'Beige',
                'image' => 'storage/products/Women Casual Sandal.png',
            ],
            [
                'name' => 'Men Running Shoes',
                'description' => 'Lightweight and breathable running shoes for daily jogs.',
                'price' => 2999.00,
                'size' => '9',
                'color' => 'Blue',
                'image' => 'storage/products/Men Running Shoe.png',
            ],
            [
                'name' => 'Kids Velcro Sneakers',
                'description' => 'Easy to wear sneakers with velcro for active kids.',
                'price' => 999.00,
                'size' => '3',
                'color' => 'Red',
                'image' => 'storage/products/Kids Velcro Sneaker.png',
            ],
            [
                'name' => 'Women Heeled Boots',
                'description' => 'Stylish ankle boots with a comfortable block heel.',
                'price' => 2799.00,
                'size' => '7',
                'color' => 'Black',
                'image' => 'storage/products/women_heeled_boots.png',
            ],
            [
                'name' => 'Men Leather Loafers',
                'description' => 'Classic formal loafers made from genuine leather.',
                'price' => 3499.00,
                'size' => '8',
                'color' => 'Black',
                'image' => 'storage/products/men_leather_loafers.png',
            ],
            [
                'name' => 'Kids Party Shoes',
                'description' => 'Shiny shoes with bow detail perfect for kids\' parties.',
                'price' => 1199.00,
                'size' => '2',
                'color' => 'Pink',
                'image' => 'storage/products/kids_party_shoes.png',
            ],
            [
                'name' => 'Women Sports Trainers',
                'description' => 'Durable trainers ideal for workouts or casual wear.',
                'price' => 2399.00,
                'size' => '6',
                'color' => 'White',
                'image' => 'storage/products/women_sports_trainers.png',
            ],
            [
                'name' => 'Men Hiking Boots',
                'description' => 'Rugged boots with high grip soles for mountain adventures.',
                'price' => 3999.00,
                'size' => '10',
                'color' => 'Black',
                'image' => 'storage/products/men_hiking_boots.png',
            ],
            [
                'name' => 'Kids Flip Flops',
                'description' => 'Cute and comfy flip flops for summer play.',
                'price' => 499.00,
                'size' => '1',
                'color' => 'Butter',
                'image' => 'storage/products/kids_flip_flops.png',
            ],
            [
                'name' => 'Women Ballet Flats',
                'description' => 'Elegant flats for office or evening wear.',
                'price' => 1799.00,
                'size' => '5',
                'color' => 'Black',
                'image' => 'storage/products/women_ballet_flats.png',
            ],
        ]);
    }
}
