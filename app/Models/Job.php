<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
