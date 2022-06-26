<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }

    public function addMedicine(Medicine $medicine)
    {
        return $this->medicines()->attach($medicine);
    }

    public function addDisease(Disease $disease)
    {
        return $this->diseases()->attach($disease);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'examination_medicines')->withTimestamps();
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'examination_diseases')->withTimestamps();
    }
}
