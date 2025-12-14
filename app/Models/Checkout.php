<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];
}

