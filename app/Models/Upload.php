<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploadable_id',
        'uploadable_type',
        'file_id',
        'created_by',
        'updated_by',
        'deleted_by ',
    ];
}
