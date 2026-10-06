<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Fiksi', 'description' => 'Novel dan cerita fiksi']);
        Category::create(['name' => 'Teknologi', 'description' => 'Buku pemrograman dan IT']);
        Category::create(['name' => 'Sejarah', 'description' => 'Buku sejarah dan biografi']);
    }
}