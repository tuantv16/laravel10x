<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .custom-pagination {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
        }
        .custom-pagination li {
            margin: 0 5px;
        }
        .custom-pagination a,
        .custom-pagination span {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .custom-pagination a:hover {
            background-color: #007bff;
            color: #ffffff;
        }
        .custom-pagination .active span {
            background-color: #007bff;
            color: #ffffff;
            border-color: #007bff;
        }
        .custom-pagination .disabled span {
            color: #6c757d;
            pointer-events: none;
            border-color: #dee2e6;
        }
    </style>

<script>
    $(document).ready(function() {
        // Hiển thị/ẩn phần tùy chọn cột khi click vào nút
        $('#toggle-columns').on('click', function() {
            $('#columns-options').toggle();
        });

        // Áp dụng ẩn/hiện cột và cập nhật URL khi click vào nút OK
        $('#apply-columns').on('click', function() {
            const selectedColumns = [];
            $('.column-toggle').each(function() {
                if ($(this).is(':checked')) {
                    selectedColumns.push($(this).data('column'));
                }
            });

            // Cập nhật giá trị trường ẩn trong form tìm kiếm
            $('#selected-columns').val(selectedColumns.join(','));

            // Chuyển hướng URL với các tham số cột được chọn
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('columns', selectedColumns.join(','));
            window.location.search = urlParams.toString();
        });

        // Ẩn/hiện cột theo tham số URL khi tải trang
        const urlParams = new URLSearchParams(window.location.search);
        const columnsParam = urlParams.get('columns');
        if (columnsParam) {
            const columnsArray = columnsParam.split(',');
            $('.column-toggle').each(function() {
                const columnClass = $(this).data('column');
                if (columnsArray.includes(columnClass)) {
                    $(this).prop('checked', true);
                    $('.col-' + columnClass).show();
                } else {
                    $(this).prop('checked', false);
                    $('.col-' + columnClass).hide();
                }
            });
        }
    });

</script>

</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Search Products</h1>
<!-- Khu vực chọn cột -->
<div class="text-end">
    <button class="btn btn-secondary" id="toggle-columns">Show/Hide Columns</button>
    <div id="columns-options" class="mt-2" style="display: none;">
        <label><input type="checkbox" class="column-toggle" data-column="name" checked> Name</label>
        <label><input type="checkbox" class="column-toggle" data-column="description" checked> Description</label>
        <label><input type="checkbox" class="column-toggle" data-column="price" checked> Price</label>
        <label><input type="checkbox" class="column-toggle" data-column="category" checked> Category</label>
        <button class="btn btn-primary btn-sm" id="apply-columns">OK</button>
    </div>
</div>

    <form method="GET" action="{{ route('products.index') }}" class="mb-4" id="search-form">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ request('name') }}">
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="price_min" class="form-control" placeholder="Min Price" value="{{ request('price_min') }}">
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="price_max" class="form-control" placeholder="Max Price" value="{{ request('price_max') }}">
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Thêm input ẩn để giữ lại thông tin về các cột đã chọn -->
        <input type="hidden" name="columns" id="selected-columns" value="{{ request('columns', 'name,description,price,category_id') }}">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                @if(in_array('name', $columnsArray))
                    <th class="col-name">
                        <a href="{{ route('products.index', array_merge(request()->all(), ['sort_by' => 'name', 'sort_order' => $sort_by == 'name' && $sort_order == 'asc' ? 'desc' : 'asc'])) }}">
                            Name
                            <i class="fas {{ $sort_by == 'name' ? ($sort_order == 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                        </a>
                    </th>
                @endif
                @if(in_array('description', $columnsArray))
                    <th class="col-description">
                        <a href="{{ route('products.index', array_merge(request()->all(), ['sort_by' => 'description', 'sort_order' => $sort_by == 'description' && $sort_order == 'asc' ? 'desc' : 'asc'])) }}">
                            Description
                            <i class="fas {{ $sort_by == 'description' ? ($sort_order == 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                        </a>
                    </th>
                @endif
                @if(in_array('price', $columnsArray))
                    <th class="col-price">
                        <a href="{{ route('products.index', array_merge(request()->all(), ['sort_by' => 'price', 'sort_order' => $sort_by == 'price' && $sort_order == 'asc' ? 'desc' : 'asc'])) }}">
                            Price
                            <i class="fas {{ $sort_by == 'price' ? ($sort_order == 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                        </a>
                    </th>
                @endif
                @if(in_array('category', $columnsArray))
                    <th class="col-category">
                        <a href="{{ route('products.index', array_merge(request()->all(), ['sort_by' => 'category_id', 'sort_order' => $sort_by == 'category_id' && $sort_order == 'asc' ? 'desc' : 'asc'])) }}">
                            Category
                            <i class="fas {{ $sort_by == 'category_id' ? ($sort_order == 'asc' ? 'fa-sort-up' : 'fa-sort-down') : 'fa-sort' }}"></i>
                        </a>
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    @if(in_array('name', $columnsArray))
                        <td class="col-name">{{ $product->name }}</td>
                    @endif
                    @if(in_array('description', $columnsArray))
                        <td class="col-description">{{ $product->description }}</td>
                    @endif
                    @if(in_array('price', $columnsArray))
                        <td class="col-price">${{ number_format($product->price, 2) }}</td>
                    @endif
                    @if(in_array('category', $columnsArray))
                        <td class="col-category">{{ $product->category->name ?? 'N/A' }}</td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columnsArray) }}">No products found.</td>
                </tr>
            @endforelse
        </tbody>
        
    </table>
    
    <!-- Phân trang tùy chỉnh -->
    @if ($products->hasPages())
        <ul class="custom-pagination">
            @if ($products->onFirstPage())
                <li class="disabled"><span>&laquo; Previous</span></li>
            @else
                <li><a href="{{ $products->previousPageUrl() }}">&laquo; Previous</a></li>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page == $products->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            @if ($products->hasMorePages())
                <li><a href="{{ $products->nextPageUrl() }}">Next &raquo;</a></li>
            @else
                <li class="disabled"><span>Next &raquo;</span></li>
            @endif
        </ul>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
