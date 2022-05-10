<?php

namespace App\Models;

use App\Models\AttributeProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $casts = [
        'options' => "array",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['options'])->using(AttributeProduct::class);
    }
}
