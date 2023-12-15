<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = ['title', 'user_id', 'status', 'listed_in', 'category_id', 'price', 'country', 'state',
        'city', 'apartment', 'address', 'image', 'description', 'size_square_meter', 'lot_size', 'rooms', 'kitchen',
        'bedrooms', 'bathrooms', 'build_date', 'garages', 'garage_size', 'available_date', 'basement', 'roofing',
        'external_construction', 'balcony', 'garden', 'chair_accessible', 'doorman', 'elevator', 'front_yard'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
