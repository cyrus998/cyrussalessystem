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
        \App\Models\Sale::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Cashier',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('qwerqwer'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Cashier Cedz',
            'email' => 'mrcvadap@tip.edu.ph',
            'password' => bcrypt('qwerqwer'),
            'role' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Cashier Cyrus',
            'email' => 'jonathanfranciscosopro@gmail.com',
            'password' => bcrypt('qwerqwer'),
            'role' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Cashier Jabal',
            'email' => 'jabal@gmail.com',
            'password' => bcrypt('qwerqwer'),
            'role' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Cashier Joe',
            'email' => 'joe@gmail.com',
            'password' => bcrypt('qwerqwer'),
            'role' => 'user',
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
            'description' => 'PROCESSOR: 12th Gen Intel® Core™ i5-12500H (2.5GHz~4.5GHz) DISPLAY: 15.6" FHD 144Hz Display MEMORY: 8GB RAM 2x DDR4 Slots (DDR4-3200, Max 64GB) STORAGE: 512GB SSD M.2 2280 x 2 (PCIe Gen3x4*1)',
        ]);

        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00002',
            'name' => 'ASUS TUF Gaming A15',
            'price' => 76995,
            'description' => 'Asus Tuf Gaming A15 FA507NV-LP051W Color: Mecha Gray Operating System: Windows 11 Home Processor: AMD Ryzen 7 7735HS Mobile Processor (8-core/16-thread, 16MB L3 cache, up to 4.7 GHz max) '
        ]);
        
        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00003',
            'name' => 'LENOVO IDEAPAD GAMING 3',
            'price' => 60995,
            'description' => 'PROCESSOR: AMD Ryzen 5 5600H DISPLAY: 15.6" FHD (1920x1080) MEMORY: 1x 8GB SO-DIMM DDR4-3200 STORAGE: 512GB SSD M.2 2242 GPU: NVIDIA GeForce RTX 3060 OS: Windows 11 Home',
        ]);

        \App\Models\Product::create([
            'category_id' => 1,
            'code' => 'PRD-00004',
            'name' => 'MSI KATANA 17 B13UCXK-276PH',
            'price' => 71950,
            'description' => 'Display: 17.3" FHD (1920*1080), 144Hz, IPS, Thin Bezel, Anti-Glare Processor: Raptor Lake i7-13620H (10-core) GPU: RTX2050, GDDR6 4GB RAM: DDR4 8GB (5200MHz) Storage: 512GB NVMe PCIe Gen3x4 SSD Network:',
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'code' => 'PRD-00005',
            'name' => 'AMD RYZEN 5 3600',
            'price' => 4990,
            'description' => 'Platform: Boxed Processor Product Family: AMD Ryzen™ Processors Product Line: AMD Ryzen™ 5 Desktop Processors Former Codename: "Matisse" # of CPU Cores: 6 # of Threads: 12 Max. Boost Clock:',
        ]);
        
        \App\Models\Product::create([
            'category_id' => 2,
            'code' => 'PRD-00006',
            'name' => 'INTEL CORE I7-13700',
            'price' => 24230,
            'description' => '(Must Be Purchased with a Compatible Motherboard) ﻿Total Cores 16 # of Performance-cores 8 # of Efficient-cores 8 Total Threads 24 Max Turbo Frequency 5.40 GHz Intel® Turbo Boost Max.',
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'code' => 'PRD-00007',
            'name' => 'AMD RYZEN 5 5500',
            'price' => 5870,
            'description' => '# of CPU Cores: 6 Multithreading (SMT): Yes # of Threads: 12 Max. Boost Clock: Up to 4.2GHz Base Clock: 3.6GHz L1 Cache: 384KB',
        ]);
        
        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-00008',
            'name' => 'GIGABYTE RTX 4070 TI AERO OC 12GB',
            'price' => 57165,
            'description' => 'Graphics Processing: GeForce RTX™ 4070 Ti Core Clock: 2640 MHz (Reference Card: 2610 MHz) CUDA® Cores: 7680 Memory Clock: 21 Gbps Memory Size: 12 GB Memory Type: GDDR6X Memory Bus:',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-00009',
            'name' => 'ASUS TUF GAMING GTX 1650 4GB GDDR6',
            'price' => 9795,
            'description' => '4GB 128-Bit GDDR6 Core Clock 1410 MHz Boost Clock 1755 MHz (Gaming Mode), 1785 MHz (OC Mode) 1 x DVI-D 1 x HDMI 2.0b 1 x DisplayPort 1.4 896 CUDA',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000010',
            'name' => 'GIGABYTE RTX 3060 TI EAGLE OC D6X 8GB',
            'price' => 25670,
            'description' => 'Graphics Processing: GeForce RTX™ 3060 Ti Core Clock: 1680 MHz (Reference Card: 1665 MHz) CUDA® Cores: 4864 Memory Clock: 19000 MHz Memory Size: 8 GB Memory Type: GDDR6X Memory Bus',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000011',
            'name' => 'GIGABYTE RTX 3060 TI VISION OC 8G ',
            'price' => 25670,
            'description' => 'Graphics Processing GeForce RTX™ 3060 Ti Core Clock 1755 MHz (Reference card: 1665 MHz) CUDA® Cores 4864 Memory Clock 14000 MHz Memory Size 8 GB Memory Type GDDR6 Memory Bus',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000012',
            'name' => 'GIGABYTE GTX 1050 TI D5 4G',
            'price' => 10240,
            'description' => 'Powered by GeForce® GTX 1050 TiIntegrated with 4GB GDDR5 128bit memory90mm Fan DesignSupport up to 8K display @60HzCore ClockBoost: 1430MHz/ Base: 1316MHz in OC ModeBoost: 1392MHz/ Base: 1290MHz in Gaming',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000013',
            'name' => 'ASUS TUF GAMING GTX 1660 SUPER OC 6GB',
            'price' => 13480,
            'description' => 'Graphics Engine NVIDIA® GeForce GTX 1660 SUPER™ Bus Standard PCI Express 3.0 OpenGL OpenGL®4.6 Video Memory GDDR6 6GB Engine Clock OC Mode - 1845 MHz (Boost Clock) Gaming Mode (Default)',
        ]);

        \App\Models\Product::create([
            'category_id' => 3,
            'code' => 'PRD-000014',
            'name' => 'GIGABYTE RX 6600 XT GAMING OC 8GB',
            'price' => 27995,
            'description' => 'Graphics Processing: Radeon™ RX 6600 XT Core Clock: Boost Clock* : up to 2593 MHz (Reference card: 2589 MHz) Game Clock* : up to 2382 MHz (Reference card: 2359 MHz)',
        ]);

    }
}
