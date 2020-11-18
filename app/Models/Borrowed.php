<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowed extends Model
{
    use HasFactory;
    protected $attributes = [
        'return_date' => 'after 7 days',
    ];
}
