<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Harry Potter',
                'author' => 'J.K. Rowling',
            ],
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
            ],
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
            ],
            [
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
            ],
            [
                'title' => 'Murder on the Orient Express',
                'author' => 'Agatha Christie',
            ],
        ]);
    }
}
