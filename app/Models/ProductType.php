<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }    

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
