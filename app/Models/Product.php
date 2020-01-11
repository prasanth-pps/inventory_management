<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','category_id','product_name','product_code','hsn_code'];

    public function category_det()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
}
