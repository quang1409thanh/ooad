<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $primaryKey = 'winner_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'product_id',
        'customer_id',
        'winners_image',
        'winning_bid',
        'end_date',
        'status',
    ];

    // Các quan hệ có thể được định nghĩa ở đây

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'product_id', 'product_id');
    }
}
