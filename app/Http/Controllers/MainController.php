<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use URL;
use App\Product;
use App\User;
use App\Expenditure;

class MainController extends Controller
{
    public function index()
    {
        return Product::with('expenditures')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'regex:/^[0-9]*$/' 
        ]);
        $product = new Product;
        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->notes = $request->input('notes');
        $product->user_id = auth()->user()->id;
        $product->save();
        return $product;
    }

    public function deleteallproduct()
    {
        Schema::disableForeignKeyConstraints();
        Expenditure::truncate();
        Product::truncate();
        Schema::enableForeignKeyConstraints();
        //Product::truncate();
        return redirect(route('home'));
    }

    public function home()
    {
        //$products = Product::all();
        //return $products;
        return view('home');
    }
    public function users()
    {
        $users = User::all();
        return $users;
    }
    public function edit($product)
    {
        $product = Product::find($product);
        return view('home.products.edit', compact('product'));
    }
    public function update(Request $request, $product)
    {
        $product = Product::find($product);
        if($request->has('name'))
        {
            $product->name = $request->input('name');
        }
        if($request->has('quantity'))
        {
            $product->quantity = $request->input('quantity');
        }
        if($request->has('notes'))
        {
            $product->notes = $request->input('notes');
        }
        $product->save();
        return redirect(URL::previous());
    }
}
