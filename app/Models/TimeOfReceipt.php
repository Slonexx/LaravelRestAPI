<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeOfReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'Receipt_Date',
        'Time',
    ];

}
