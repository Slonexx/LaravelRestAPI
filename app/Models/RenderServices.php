<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenderServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'Animal_card_id',
        'Service_id',
        'Doctor_id',
        'Time_Of_Receipts_id',
    ];

}
