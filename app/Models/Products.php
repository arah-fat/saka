<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
// Think of the model as the class you use to CRUD records
{
    protected $fillable = [
        'product_name',
        'product_image',
        'price',
        'description',
        'created_by',
        'updated_by',
    ];
}
