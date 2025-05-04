<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
        ]);

    //     // Create products with actual shoe images
    //     Product::create([
    //         'name' => 'Running Shoes',
    //         'description' => 'Lightweight and comfortable running shoes.',
    //         'price' => 90,
    //         'size' => '42',
    //         'color' => 'Blue',
    //         'image_url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Casual Sneakers',
    //         'description' => 'Stylish sneakers for everyday wear.',
    //         'price' => 75,
    //         'size' => '40',
    //         'color' => 'White',
    //         'image_url' => 'https://images.unsplash.com/photo-1600269452121-4f2416e55c28?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Basketball Shoes',
    //         'description' => 'High-performance shoes for basketball players.',
    //         'price' => 120,
    //         'size' => '44',
    //         'color' => 'Red',
    //         'image_url' => 'https://images.unsplash.com/photo-1605348532760-6753d2c43329?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Hiking Boots',
    //         'description' => 'Durable boots for outdoor adventures.',
    //         'price' => 150,
    //         'size' => '43',
    //         'color' => 'Brown',
    //         'image_url' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Sandals',
    //         'description' => 'Comfortable sandals for summer days.',
    //         'price' => 45,
    //         'size' => '39',
    //         'color' => 'Black',
    //         'image_url' => 'https://images.unsplash.com/photo-1562273138-f46be4ebdf33?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Formal Dress Shoes',
    //         'description' => 'Elegant shoes for formal occasions.',
    //         'price' => 110,
    //         'size' => '41',
    //         'color' => 'Black',
    //         'image_url' => 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Skate Shoes',
    //         'description' => 'Durable shoes designed for skateboarding.',
    //         'price' => 85,
    //         'size' => '42',
    //         'color' => 'Gray',
    //         'image_url' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Trail Running Shoes',
    //         'description' => 'Grippy shoes for trail running.',
    //         'price' => 130,
    //         'size' => '43',
    //         'color' => 'Green',
    //         'image_url' => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Slip-on Loafers',
    //         'description' => 'Convenient slip-on shoes for casual wear.',
    //         'price' => 65,
    //         'size' => '40',
    //         'color' => 'Navy',
    //         'image_url' => 'https://images.unsplash.com/photo-1595341888016-a392ef81b7de?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Winter Boots',
    //         'description' => 'Insulated boots for cold weather.',
    //         'price' => 175,
    //         'size' => '42',
    //         'color' => 'Black',
    //         'image_url' => 'https://images.unsplash.com/photo-1549318581-ec37a7d2b771?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Cycling Shoes',
    //         'description' => 'Specialized shoes for cycling enthusiasts.',
    //         'price' => 140,
    //         'size' => '44',
    //         'color' => 'Yellow',
    //         'image_url' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Minimalist Barefoot Shoes',
    //         'description' => 'Lightweight shoes for natural movement.',
    //         'price' => 95,
    //         'size' => '41',
    //         'color' => 'Violet',
    //         'image_url' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'High-Top Sneakers',
    //         'description' => 'Classic high-top sneakers for street style.',
    //         'price' => 88,
    //         'size' => '42',
    //         'color' => 'White/Red',
    //         'image_url' => 'https://images.unsplash.com/photo-1600269452121-4f2416e55c28?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Golf Shoes',
    //         'description' => 'Specialized shoes with excellent grip for golf.',
    //         'price' => 125,
    //         'size' => '43',
    //         'color' => 'White/Blue',
    //         'image_url' => 'https://images.unsplash.com/photo-1593773713710-6bfaba5a9a9e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);

    //     Product::create([
    //         'name' => 'Climbing Shoes',
    //         'description' => 'Technical shoes for rock climbing.',
    //         'price' => 115,
    //         'size' => '40',
    //         'color' => 'Orange',
    //         'image_url' => 'https://images.unsplash.com/photo-1511895426328-dc8714191300?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80'
    //     ]);
    
}


}
