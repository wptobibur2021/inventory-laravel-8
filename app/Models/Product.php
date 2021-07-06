<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Invoice;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_slug',
        'category_id',
        'brand_id',
        'product_code',
        'root',
        'buying_price',
        'selling_price',
        'supplier_id',
        'buying_date',
        'image',
        'status',
        'return',
        'damage',
        'product_quantity'
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'product_id');
    }

}
