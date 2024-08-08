<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    
    // 必要なメソッドを追加
    public function findAllProducts()
    {
        return self::all();
    }

    public function insertProducts($request)
    {
        return self::create($request->all());
    }
}