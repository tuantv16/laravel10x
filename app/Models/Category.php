<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Khai báo tên bảng nếu cần (không bắt buộc nếu tên bảng theo chuẩn Laravel)
    protected $table = 'categories';

    // Các trường có thể được điền vào từ request (mass assignable)
    protected $fillable = ['name', 'description'];

    // Định nghĩa mối quan hệ với model `Product`
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
