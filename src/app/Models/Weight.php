<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Weight extends Model
{
    use HasFactory;

    protected $table = 'weights';

    protected $casts = [
        'weight' => 'double',
        'day' => 'date',
        'user_id' => 'int',
    ];

    protected $guarded = [];

    
}
