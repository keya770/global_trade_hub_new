<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VesselInquiry extends Model
{
    protected $fillable = [
        // Basic Contact Information
        'full_name',
        'email',
        'phone',
        'company_name',
        
        // Organisation Details
        'organisation_type',
        'address',
        
        // Inquiry Type and Status
        'inquiry_type',
        'status',
        
        // Vessel Details (Common)
        'vessel_type',
        'year_of_build',
        'dwt',
        
        // Sale & Purchase Specific Fields
        'ship_type',
        'build_nation',
        'budget',
        'trading_area',
        'delivery_location',
        'timeline',
        'action',
        
        // Chartering Specific Fields
        'charter_type',
        'laycan_date',
        'delivery_date',
        'start_date',
        'budget_per_ton',
        'budget_per_day',
        
        // Freight Details
        'port_of_loading',
        'port_of_discharge',
        'cargo_type',
        'cargo_quantity',
        'load_rate',
        'discharge_rate',
        
        // Additional Information
        'additional_notes',
        'admin_notes',
        'assigned_to',
        'processed_at',
        'vessel_id',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'budget_per_ton' => 'decimal:2',
        'budget_per_day' => 'decimal:2',
        'dwt' => 'decimal:2',
        'cargo_quantity' => 'decimal:2',
        'load_rate' => 'decimal:2',
        'discharge_rate' => 'decimal:2',
        'timeline' => 'date',
        'laycan_date' => 'date',
        'delivery_date' => 'date',
        'start_date' => 'date',
        'processed_at' => 'datetime',
    ];

    /**
     * Get the vessel that this inquiry is related to
     */
    public function vessel(): BelongsTo
    {
        return $this->belongsTo(Vessel::class);
    }

    /**
     * Get the user assigned to this inquiry
     */
    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Scope for pending inquiries
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for completed inquiries
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope for today's inquiries
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope for sale & purchase inquiries
     */
    public function scopeSalePurchase($query)
    {
        return $query->where('inquiry_type', 'sale_purchase');
    }

    /**
     * Scope for chartering inquiries
     */
    public function scopeChartering($query)
    {
        return $query->where('inquiry_type', 'chartering');
    }

    /**
     * Get formatted budget
     */
    public function getFormattedBudgetAttribute(): string
    {
        if ($this->budget) {
            return '$' . number_format($this->budget);
        }
        return 'Not specified';
    }

    /**
     * Get formatted vessel specifications
     */
    public function getVesselSpecsAttribute(): string
    {
        $specs = [];
        
        if ($this->dwt) {
            $specs[] = number_format($this->dwt) . ' DWT';
        }
        
        if ($this->year_of_build) {
            $specs[] = 'Built: ' . $this->year_of_build;
        }
        
        return implode(', ', $specs);
    }

    /**
     * Get inquiry type label
     */
    public function getInquiryTypeLabelAttribute(): string
    {
        return match($this->inquiry_type) {
            'sale_purchase' => 'Sale & Purchase',
            'chartering' => 'Chartering',
            default => ucfirst($this->inquiry_type)
        };
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'processing' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }
}
