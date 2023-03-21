<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
