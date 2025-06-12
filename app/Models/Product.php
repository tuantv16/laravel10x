<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Khai báo tên bảng nếu cần (không bắt buộc nếu tên bảng theo chuẩn Laravel)
    protected $table = 'products';

    // Các trường có thể được điền vào từ request (mass assignable)
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    // Định nghĩa mối quan hệ với model `Category`
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

