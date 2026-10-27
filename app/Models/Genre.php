<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getData()
    {
        return [
            ['id' => 1, 'name' => 'Romance'],
            ['id' => 2, 'name' => 'Mystery'],
            ['id' => 3, 'name' => 'Fantasy'],
            ['id' => 4, 'name' => 'Horror'],
            ['id' => 5, 'name' => 'Science Fiction'],
        ];
    }
}