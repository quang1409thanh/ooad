<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $primaryKey = 'billing_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'customer_id',
        'product_id',
        'purchase_date',
        'purchase_amount',
        'payment_type',
        'card_type',
        'card_number',
        'expire_date',
        'cvv_number',
        'card_holder',
        'delivery_date',
        'note',
        'status',
    ];

    // Các quan hệ có thể được định nghĩa ở đây

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

}
