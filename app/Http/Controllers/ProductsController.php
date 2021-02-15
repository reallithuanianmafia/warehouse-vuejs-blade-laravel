<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index');
    }
}
