<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total'];

    // Quan hệ nhiều-nhiều với Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity') // Lấy thêm trường quantity từ bảng trung gian
                    ->withTimestamps(); // Lưu thông tin timestamp
    }
}
