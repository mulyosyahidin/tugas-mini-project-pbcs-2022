<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study_program extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'name',
        'code',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
