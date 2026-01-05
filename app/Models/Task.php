<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
        'is_completed',
    ];
}
