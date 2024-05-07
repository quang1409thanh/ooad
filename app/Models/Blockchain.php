<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    use HasFactory;
    protected $primaryKey = 'blockchain_id'; // Khai báo khóa chính của bảng

    protected $fillable = [
        'timestamp',
        'data',
        'previous_hash',
        'hash',
    ];

}
