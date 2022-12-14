<?php

namespace App\Models;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_name',
        'picture',
        'description',
        'available_quantity',
        'price',
        'user_email'
    ];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}
