<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sublink extends Model
{
    protected $table = 'sublinks';

    protected $fillable = [
        'title',
        'content',
        'category',
        'thumbnail',
        'visit',
        'status',
    ];
}
