<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Name_Service',
        'Descriptions',
        'Clinic_id',
    ];

    protected $dates = ['deleted_at'];

    public function DoctorList(){
        return $this->hasMany(Doctor::class);

    }
}
