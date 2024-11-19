<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public $timestamps = false;//これを付けないとupdated_atのカラムが必要になる

    const CREATED_AT = NULL;
    const APDATED_AT = NULL;

    protected $fillable =[
        'name','color'
    ];
}
