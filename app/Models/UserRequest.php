<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'document',
        'phone',
        'faculty_id', // Foreign key 
        'school_id', // Foreign key 
        
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
