<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $primaryKey = 'message_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message_date_time',
        'product_id',
        'message',
        'status',
    ];

    // Các quan hệ có thể được định nghĩa ở đây

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function sender()
    {
        return $this->belongsTo(Customer::class, 'sender_id', 'customer_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Customer::class, 'receiver_id', 'customer_id');
    }

}
