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
        return $this->belongsTo(User::class, 'id');
    }

    public function addMedicine(Medicine $medicine, $quantity)
    {
        return $this->medicines()->attach($medicine, ['quantity' => $quantity]);
    }

    public function addExaminationRequest(User $user)
    {
        return $this->users()->attach($user);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'user_id', 'owner_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'location_users')->withTimestamps();
    }
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'location_medicines')->withTimestamps();
    }
}
