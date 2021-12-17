<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'birthdate',
        'cpf'
    ];
    
    public $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getCpfAttribute($value) {
        return $value;
    }
}
