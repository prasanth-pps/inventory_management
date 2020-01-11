<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'category_name', 'description'];

    public function product_det()
    {
        return $this->hasMany(Product::class);
    }
}
