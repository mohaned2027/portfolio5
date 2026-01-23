<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
    ];

    protected $casts = [
        'order' => 'array',
    ];
}
