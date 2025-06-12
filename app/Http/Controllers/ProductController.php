<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Lọc theo các trường tìm kiếm
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // Lấy thông tin cột và thứ tự sắp xếp từ request
        $sort_by = $request->input('sort_by', 'name');
        $sort_order = $request->input('sort_order', 'asc');

        // Kiểm tra các cột hợp lệ để sắp xếp
        $allowedSorts = ['name', 'description', 'price', 'category_id'];
        if (!in_array($sort_by, $allowedSorts)) {
            $sort_by = 'name';
        }

        // Áp dụng sắp xếp
        $query->orderBy($sort_by, $sort_order);

        // Lấy danh sách các cột cần hiển thị
        $columns = $request->input('columns', 'name,description,price,category_id');
        $columnsArray = explode(',', $columns);

        $products = $query->paginate(10)->appends($request->all());

        return view('products.index', compact('products', 'sort_by', 'sort_order', 'columnsArray'));
    }

}