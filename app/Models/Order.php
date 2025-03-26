<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_type',
        'date_of_receipt',
        'pick_up_time',
        'number_of_days',
        'receiving_location',
        'total_price',
        'payment_method',
        'payment_status',
    ];
}
