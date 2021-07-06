<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'employee_id',
        'root',
        'product_id',
        'price',
        'qty'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }


    public function expense(){
        return $this->belongsTo(Category::class, 'employee_id');
    }
}
