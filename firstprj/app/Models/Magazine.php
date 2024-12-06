<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $table = 'magazine';

    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;

    protected $fillable=[
        'title',
        'impression',
        'photograph'
    ];
}
