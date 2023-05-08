<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
