<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'description',
        'branch_id', 
        'image',
        'product_type_id',
    ];

    protected $casts = [
        'colors' => 'array',
    ];    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }    

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
