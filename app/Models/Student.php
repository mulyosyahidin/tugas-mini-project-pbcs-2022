<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_program_id',
        'name',
        'npm',
    ];

    public function study_program()
    {
        return $this->belongsTo(Study_program::class);
    }
}
