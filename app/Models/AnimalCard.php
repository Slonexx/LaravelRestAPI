<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nickname_Animal',
        'Type_Animal',
        'Age_Animal',
        'User_id',
    ];
}
