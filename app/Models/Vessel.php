<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'image',
        'capacity',
        'length',
        'width',
        'draft',
        'daily_rate',
        'flag',
        'built_year',
        'imo_number',
        'is_available',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'capacity' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'draft' => 'decimal:2',
        'daily_rate' => 'decimal:2',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
