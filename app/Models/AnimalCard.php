<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'Nickname_Animal',
        'Type_Animal',
        'Age_Animal',
        'User_id',
    ];

    protected $dates = ['deleted_at'];

    public function RenderList(){
        return $this->hasMany(RenderServices::class);
    }
}
