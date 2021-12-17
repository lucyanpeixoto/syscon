<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    public $fillable = [
        'date',
        'quantity'
    ];

    public $hidden = [
        'created_at',
        'updated_at'
    ];
}
