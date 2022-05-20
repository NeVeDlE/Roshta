<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function addMedicine(Medicine $medicine, $quantity)
    {
        return $this->medicines()->attach($medicine, ['quantity' => $quantity]);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'location_medicines')->withTimestamps();
    }
}
