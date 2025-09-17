<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'service_id',
        'parent_id',
        'name',
        'description',
        'content',
        'icon',
        'image',
        'is_active',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the main service that this sub-service belongs to.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the parent sub-service (for sub-sub services).
     */
    public function parent()
    {
        return $this->belongsTo(SubService::class, 'parent_id');
    }

    /**
     * Get the children sub-services (sub-sub services).
     */
    public function children()
    {
        return $this->hasMany(SubService::class, 'parent_id');
    }

    /**
     * Scope a query to only include active sub-services.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /**
     * Scope a query to only include top-level sub-services (no parent).
     */
    public function scopeTopLevel($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope a query to only include sub-sub services (has parent).
     */
    public function scopeSubSubServices($query)
    {
        return $query->whereNotNull('parent_id');
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
     * Check if this is a sub-sub service.
     */
    public function isSubSubService()
    {
        return !is_null($this->parent_id);
    }

    /**
     * Check if this is a top-level sub-service.
     */
    public function isTopLevel()
    {
        return is_null($this->parent_id);
    }

    /**
     * Get the full hierarchy path.
     */
    public function getHierarchyPathAttribute()
    {
        $path = [$this->name];
        
        if ($this->parent) {
            $path = array_merge($this->parent->hierarchy_path, $path);
        }
        
        return $path;
    }

    /**
     * Get the display name with hierarchy.
     */
    public function getDisplayNameAttribute()
    {
        if ($this->isSubSubService()) {
            return $this->parent->name . ' → ' . $this->name;
        }
        
        return $this->name;
    }
}
