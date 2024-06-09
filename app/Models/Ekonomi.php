<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Illuminate\Database\Eloquent\Model;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekonomi extends Model implements CanVisit
{
    use HasFactory, HasVisits;
    protected $guarded = [];
}
