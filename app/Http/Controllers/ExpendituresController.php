<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Expenditure;


class ExpendituresController extends Controller
{
    public function index()
    {
        return $products = Product::orderBy('id', 'DESC')->get();
        //$expenditures = Expenditure::all();
            
    }
    public function expenditures()
    {
        return view('expenditures.index');
    }
    public function store(Request $request)
    {
        $expenditure = new Expenditure;
        $expenditure->product_id = $request->input('id');
        $expenditure->date = $request->input('date');
        $expenditure->quantity = $request->input('quantity');
        $expenditure->notes = $request->input('notes');
        $expenditure->user_id = auth()->user()->id;
        $expenditure->save();
        return $expenditure;
    }
    public function destroy(Request $request, $expenditure)
    {
        $expenditure = Expenditure::where('id', $expenditure)->first();
        $expenditure->delete();
        return 'deleted';
        //return $request;
    }

    public function relations(Request $request)
    {
        dd($request);
    }
}
