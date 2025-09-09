<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VesselInquiry extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'company_name',
        'vessel_type',
        'vessel_dwt',
        'built_year_from',
        'built_year_to',
        'flag',
        'length',
        'width',
        'draft',
        'inquiry_type',
        'budget_from',
        'budget_to',
        'additional_notes',
        'status',
        'admin_notes',
        'assigned_to',
        'processed_at',
        'vessel_id',
    ];

    protected $casts = [
        'budget_from' => 'decimal:2',
        'budget_to' => 'decimal:2',
        'vessel_dwt' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'draft' => 'decimal:2',
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
     * Get formatted budget range
     */
    public function getBudgetRangeAttribute(): string
    {
        if ($this->budget_from && $this->budget_to) {
            return '$' . number_format($this->budget_from) . ' - $' . number_format($this->budget_to);
        } elseif ($this->budget_from) {
            return '$' . number_format($this->budget_from) . '+';
        } elseif ($this->budget_to) {
            return 'Up to $' . number_format($this->budget_to);
        }
        return 'Not specified';
    }

    /**
     * Get formatted vessel specifications
     */
    public function getVesselSpecsAttribute(): string
    {
        $specs = [];
        
        if ($this->vessel_dwt) {
            $specs[] = number_format($this->vessel_dwt) . ' DWT';
        }
        
        if ($this->built_year_from && $this->built_year_to) {
            $specs[] = 'Built: ' . $this->built_year_from . '-' . $this->built_year_to;
        } elseif ($this->built_year_from) {
            $specs[] = 'Built: ' . $this->built_year_from . '+';
        }
        
        if ($this->length && $this->width) {
            $specs[] = $this->length . 'm × ' . $this->width . 'm';
        }
        
        return implode(', ', $specs);
    }
}
