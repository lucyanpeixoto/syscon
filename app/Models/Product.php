<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\Lot;

class Product extends Model
{
    use HasFactory;

    public $hidden = [
        'created_at',
        'updated_at',
        'lot_id',
        'color_id'
    ];

    public $with = [
        'color',
        'lot'
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }
}
