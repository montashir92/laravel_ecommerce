<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    
    public $fillable = [
        'product_id',
        'color_id',
    ];
    
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
