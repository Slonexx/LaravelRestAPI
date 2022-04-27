<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Name_Clinic',
        'Address',
        'photo_id',
    ];

    protected $dates = ['deleted_at'];

    public function DoctorList(){
        return $this->hasMany(Doctor::class);
    }

}
