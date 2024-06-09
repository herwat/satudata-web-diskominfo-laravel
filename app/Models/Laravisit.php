<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laravisit extends Model
{
    use HasFactory;
    // protected $guarded = [];

    protected $fillable = [
        'visitable_type',
        'visitable_id',
        'data',
    ];
}
