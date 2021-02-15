<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Expenditure extends Model
{
    protected $table = 'expenditure';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
