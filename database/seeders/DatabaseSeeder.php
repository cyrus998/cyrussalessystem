<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('qwerqwer'),
            'role' => 'admin',
        ]);

        \App\Models\Category::create([
            'name' => 'Gaming Laptops',
        ]);

        \App\Models\Category::create([
            'name' => 'Desktop Processors',
        ]);

        \App\Models\Category::create([
            'name' => 'Graphics Cards',
        ]);

        \App\Models\Category::create([
            'name' => 'Ram Modules',
        ]);

        \App\Models\Category::create([
            'name' => 'CPU Coolers',
        ]);

        \App\Models\Category::create([
            'name' => 'PC Case / Chassis',
        ]);

        \App\Models\Category::create([
            'name' => 'Power Supplies',
        ]);

        \App\Models\Category::create([
            'name' => 'Case Fans',
        ]);

        \App\Models\Category::create([
            'name' => 'Monitors',
        ]);

        \App\Models\Category::create([
            'name' => 'Microphones',
        ]);

        \App\Models\Category::create([
            'name' => 'Gaming Mouse',
        ]);

        \App\Models\Category::create([
            'name' => 'Mechanical Keyboards',
        ]);

        \App\Models\Category::create([
            'name' => 'Mousepads',
        ]);

        \App\Models\Category::create([
            'name' => 'Hard Disk Drives',
        ]);

        \App\Models\Category::create([
            'name' => 'Solid State Drives',
        ]);
      
        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00001',
            'name' => 'GIGABYTE G5',
            'price' => 72000,
        ]);
        
        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00002',
            'name' => 'ASUS TUF Gaming A15',
            'price' => 76995,
        ]);
        
        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00003',
            'name' => 'LENOVO IDEAPAD GAMING 3',
            'price' => 60995,
        ]);

        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00004',
            'name' => 'MSI KATANA 17 B13UCXK-276PH',
            'price' => 71950,
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'code' => 'PRD-00005',
            'name' => 'AMD RYZEN 5 3600',
            'price' => 4990,
        ]);
        
        \App\Models\Product::create([
            'category_id' => 2,
            'code' => 'PRD-00006',
            'name' => 'INTEL CORE I7-13700',
            'price' => 24230,
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'code' => 'PRD-00007',
            'name' => 'AMD RYZEN 5 5500',
            'price' => 5870,
        ]);
        
        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-00008',
            'name' => 'GIGABYTE RTX 4070 TI AERO OC 12GB',
            'price' => 57165,
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-00009',
            'name' => 'ASUS TUF GAMING GTX 1650 4GB GDDR6',
            'price' => 9795,
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000010',
            'name' => 'GIGABYTE RTX 3060 TI EAGLE OC D6X 8GB',
            'price' => 25670,
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000011',
            'name' => 'GIGABYTE RTX 3060 TI VISION OC 8G ',
            'price' => 25670,
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000012',
            'name' => 'GIGABYTE GTX 1050 TI D5 4G',
            'price' => 10240,
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000013',
            'name' => 'ASUS TUF GAMING GTX 1660 SUPER OC 6GB',
            'price' => 13480,
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000014',
            'name' => 'GIGABYTE RX 6600 XT GAMING OC 8GB',
            'price' => 27995,
        ]);

    }
}
