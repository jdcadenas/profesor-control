<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'faculty_id');
    }

    public function userRequests()
    {
        return $this->hasMany(UserRequest::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
