<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = [
        'category'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function availableProductsByCategory($value)
    {
        return $this->where('product_category_id', $value)
            ->get();
    }

    public function getAvailableProduct($value)
    {
        return $this->whereId($value);
    }
}
