<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeOfReceipt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Receipt_Date',
        'Time',
    ];

    protected $dates = ['deleted_at'];
}
