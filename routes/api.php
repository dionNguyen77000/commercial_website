<?php




use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('categories', 'Categories\CategoryController');
Route::resource('products', 'Products\ProductController');

Route::get('/', function() {
    $categories = Category::parents()->ordered()->get();
    dd($categories);
});