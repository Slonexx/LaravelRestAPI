<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name_Clinic',
        'Address',
        'URL_Picture',
    ];

    public function DoctorList(){
        return $this->hasMany(Doctor::class);
    }
}
