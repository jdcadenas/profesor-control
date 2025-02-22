<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'faculty_id', // Foreign key 
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'school_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function userRequests()
    {
        return $this->hasMany(UserRequest::class);
    }
}
