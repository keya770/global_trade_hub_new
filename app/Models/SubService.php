<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = [
    'parent_id',
    'service_id',
    'name',
    'description',
    'content',
    'icon',
    'image',
    'type',
    'is_active',
    'sort_order',
];
}
