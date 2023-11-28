<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; 
use Illuminate\Support\Facades\Hash; 

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);

        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@mail.com';
        $admin->password = Hash::make('admin');
        $admin->save();
    }
}

