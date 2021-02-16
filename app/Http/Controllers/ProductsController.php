<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\Product;
class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index');
    }
    public function destroy($productid)
    {
        $product = Product::find($productid);
        $product->delete();
        return 'deleted';
    }
}
