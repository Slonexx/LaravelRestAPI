<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Name_Doctor',
        'Speciality',
        'URL_Picture',
        'Clinic_id',
    ];

    protected $dates = ['deleted_at'];
}
