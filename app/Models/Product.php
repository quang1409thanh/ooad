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

    public function winner()
    {
        return $this->hasOne(Winner::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function getFirstImageAttribute()
    {
        if (is_string($this->product_image)) {
            return json_decode($this->product_image, true)[0] ?? 'noimage.gif';
        } else if (is_array($this->product_image)) {
            return $this->product_image[0] ?? 'noimage.gif';
        } else {
            return 'noimage.gif';
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function scopeByCategoryId($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeStartingBefore($query, $dateTime)
    {
        return $query->where('start_date_time', '<=', $dateTime);
    }

    public function scopeCustomerNotNull($query)
    {
        return $query->whereNotNull('customer_id');
    }

    public function scopeOrderByLatest($query)
    {
        return $query->orderBy('product_id', 'DESC');
    }

    public function scopeLimit($query, $limit)
    {
        return $query->limit($limit);
    }

    public function getFirstImagePathAttribute()
    {
        if (is_string($this->product_image)) {
            $images = json_decode($this->product_image, true);
            return isset($images[0]) ? $images[0] : 'noimage.gif';
        } else if (is_array($this->product_image)) {
            return isset($this->product_image[0]) ? $this->product_image[0] : 'noimage.gif';
        } else {
            return 'noimage.gif';
        }
    }

    public function getAllImagePathsAttribute()
    {
        if (is_string($this->product_image)) {
            $images = json_decode($this->product_image, true);
            return is_array($images) ? $images : ['noimage.gif'];
        } else if (is_array($this->product_image)) {
            return $this->product_image;
        } else {
            return ['noimage.gif'];
        }
    }

    public function product()
    {
        return $this->hasMany(Bidding::class, 'product_id', 'product_id');
    }

    public function countBidders()
    {
        return Bidding::where('product_id', $this->product_id)
            ->distinct('customer_id')
            ->count('customer_id');
    }

    public function countBids()
    {
        return Bidding::where('product_id', $this->product_id)->count();
    }

}
