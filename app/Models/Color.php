<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    public $hidden = [
        'created_at',
        'updated_at'
    ];
}
