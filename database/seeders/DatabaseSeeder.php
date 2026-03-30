<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        // Create Test User
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Create Categories
        $categories = [
            ['name' => 'Electronics', 'description' => 'Latest electronic devices and gadgets', 'image' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?w=600&q=80'],
            ['name' => 'Clothing', 'description' => 'Fashionable clothes for all ages', 'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=600&q=80'],
            ['name' => 'Books', 'description' => 'Wide range of books and literature', 'image' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=600&q=80'],
            ['name' => 'Home & Garden', 'description' => 'Everything for your home', 'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&q=80'],
            ['name' => 'Sports', 'description' => 'Sports equipment and accessories', 'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=600&q=80'],
            ['name' => 'Beauty', 'description' => 'Beauty and personal care products', 'image' => null],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'image' => $category['image'],
                'status' => true,
            ]);
        }

        // Create Products
        $products = [
            ['name' => 'Smartphone Pro', 'category_id' => 1, 'price' => 699.99, 'stock' => 50, 'description' => 'Latest smartphone with amazing features', 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500&q=80'],
            ['name' => 'Laptop Elite', 'category_id' => 1, 'price' => 1299.99, 'stock' => 30, 'description' => 'High-performance laptop for professionals', 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=500&q=80'],
            ['name' => 'Wireless Earbuds', 'category_id' => 1, 'price' => 99.99, 'stock' => 100, 'description' => 'Premium wireless earbuds with noise cancellation', 'image' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=500&q=80'],
            ['name' => 'Cotton T-Shirt', 'category_id' => 2, 'price' => 19.99, 'stock' => 200, 'description' => 'Comfortable cotton t-shirt', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&q=80'],
            ['name' => 'Denim Jeans', 'category_id' => 2, 'price' => 49.99, 'stock' => 150, 'description' => 'Classic denim jeans', 'image' => 'https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?w=500&q=80'],
            ['name' => 'Winter Jacket', 'category_id' => 2, 'price' => 89.99, 'stock' => 75, 'description' => 'Warm winter jacket', 'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500&q=80'],
            ['name' => 'Programming Book', 'category_id' => 3, 'price' => 39.99, 'stock' => 80, 'description' => 'Learn programming from scratch', 'image' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=500&q=80'],
            ['name' => 'Novel Collection', 'category_id' => 3, 'price' => 24.99, 'stock' => 120, 'description' => 'Best selling novels collection', 'image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=500&q=80'],
            ['name' => 'Coffee Maker', 'category_id' => 4, 'price' => 79.99, 'stock' => 60, 'description' => 'Automatic coffee maker', 'image' => 'https://images.unsplash.com/photo-1517668808822-9ebb02f2a0e6?w=500&q=80'],
            ['name' => 'Garden Tools Set', 'category_id' => 4, 'price' => 59.99, 'stock' => 40, 'description' => 'Complete garden tools set', 'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=500&q=80'],
            ['name' => 'Yoga Mat', 'category_id' => 5, 'price' => 29.99, 'stock' => 90, 'description' => 'Non-slip yoga mat', 'image' => 'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=500&q=80'],
            ['name' => 'Basketball', 'category_id' => 5, 'price' => 34.99, 'stock' => 70, 'description' => 'Professional basketball', 'image' => 'https://images.unsplash.com/photo-1519861531473-92002639313d?w=500&q=80'],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'category_id' => $product['category_id'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'image' => $product['image'],
                'status' => true,
            ]);
        }
    }
}
