<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'customer_id',
        'product_name',
        'category_id',
        'product_description',
        'starting_bid',
        'ending_bid',
        'start_date_time',
        'end_date_time',
        'product_cost',
        'product_image',
        'product_warranty',
        'product_delivery',
        'company_name',
        'status',
    ];

    // Các quan hệ có thể được định nghĩa ở đây

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

}
