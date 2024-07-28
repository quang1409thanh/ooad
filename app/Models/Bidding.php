
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    use HasFactory;
    protected $primaryKey = 'bidding_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'customer_id',
        'product_id',
        'bidding_amount',
        'bidding_date_time',
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
