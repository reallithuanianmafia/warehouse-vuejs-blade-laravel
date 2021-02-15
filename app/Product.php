<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expenditure;
class Product extends Model
{
    public $table = 'products';

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }
}
