<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Seller extends Model
{
    use HasFactory;

    public $with = ['user'];

    public $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
