<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function locations()
    {
        return $this->hasOne(Location::Class, 'owner_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function addLocation($name, $lat, $lng, $type)
    {
        return $this->locations()->create([
            'name' => $name,
            'owner_id' => $this->id,
            'lat' => $lat,
            'lng' => $lng,
            'type' => $type
        ]);
    }

    public function requestsNumber(): int
    {
        return sizeof(\DB::table('location_users')
            ->select('location_users.id')
            ->where('location_users.user_id', '=', $this->id)
            ->where('status', 'pending')->get());
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class, 'patient_id');
    }

    public function addRole($name)
    {

        return $this->role()->create(['name' => $name]);
    }

}
