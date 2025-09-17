<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sector extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'vessel_sizes',
        'cargo_types',
        'services',
        'image',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Boot the model and add event listeners.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sector) {
            if (empty($sector->slug)) {
                $sector->slug = Str::slug($sector->title);
            }
        });

        static::updating(function ($sector) {
            if ($sector->isDirty('title') && empty($sector->slug)) {
                $sector->slug = Str::slug($sector->title);
            }
        });
    }

    /**
     * Scope a query to only include active sectors.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the image URL.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    /**
     * Get vessel sizes as array.
     */
    public function getVesselSizesArrayAttribute()
    {
        return $this->vessel_sizes ? explode(',', $this->vessel_sizes) : [];
    }

    /**
     * Get cargo types as array.
     */
    public function getCargoTypesArrayAttribute()
    {
        return $this->cargo_types ? explode(',', $this->cargo_types) : [];
    }

    /**
     * Get services as array.
     */
    public function getServicesArrayAttribute()
    {
        return $this->services ? explode(',', $this->services) : [];
    }
}
