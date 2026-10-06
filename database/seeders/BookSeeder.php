<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $fiksi = Category::where('name', 'Fiksi')->first();
        $tech = Category::where('name', 'Teknologi')->first();
        $sejarah = Category::where('name', 'Sejarah')->first();

        Book::create(['category_id' => $fiksi->id, 'title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka', 'year' => 2005, 'stock' => 10]);
        Book::create(['category_id' => $fiksi->id, 'title' => 'Bumi', 'author' => 'Tere Liye', 'publisher' => 'Gramedia', 'year' => 2014, 'stock' => 7]);
        Book::create(['category_id' => $tech->id, 'title' => 'Belajar Laravel', 'author' => 'Budi Raharjo', 'publisher' => 'Informatika', 'year' => 2022, 'stock' => 5]);
        Book::create(['category_id' => $tech->id, 'title' => 'Dasar Pemrograman Web', 'author' => 'Rina Sari', 'publisher' => 'Andi', 'year' => 2021, 'stock' => 8]);
        Book::create(['category_id' => $sejarah->id, 'title' => 'Sejarah Indonesia Modern', 'author' => 'M.C. Ricklefs', 'publisher' => 'Serambi', 'year' => 2008, 'stock' => 3]);
    }
}