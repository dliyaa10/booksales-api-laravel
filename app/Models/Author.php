<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function getData()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling'],
            ['id' => 2, 'name' => 'Tere Liye'],
            ['id' => 3, 'name' => 'Andrea Hirata'],
            ['id' => 4, 'name' => 'Dan Brown'],
            ['id' => 5, 'name' => 'Agatha Christie'],
        ];
    }
}