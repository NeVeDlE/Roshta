<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, $search)
    {
        $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');
    }
}
