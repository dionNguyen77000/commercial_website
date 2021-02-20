<?php

namespace App\Http\Controllers\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductIndexResource;
use App\Scoping\Scopes\CategoryScope;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::withScopes($this->scopes())->get();
        // dd($products);
        return ProductIndexResource::collection(
            $products
        );
    }

    public function show(Product $product)
    {
        return new ProductResource(
            $product  
        );
    }

    protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
}
