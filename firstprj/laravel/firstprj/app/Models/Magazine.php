<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $table = 'magazine';

    public $timestamps = false;//これを付けないとupdated_atのカラムが必要になる

    const CREATED_AT = NULL;
    const UPDATE_AT = NULL;

    protected $fillable=[
        'title',
        'impression',
        'photograph'
    ];
}
