<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenderServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'Diagnosis',
        'Appointment',
        'Add_Info',
        'Animal_Cards_id',
        'Service_id',
        'Doctor_id',
        'Time_Of_Receipts_id',
    ];
}
