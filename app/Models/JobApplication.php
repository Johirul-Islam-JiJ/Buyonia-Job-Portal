<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getImageAttribute($value): ?string
    {
        if($value)
            return asset('storage/'. $value);

        return null;
    }
    public function getResumeAttributes($value): ?string
    {
        if($value)
            return asset('storage/'.$value);
        return null;
    }
    public function getCoverLetterAttributes($value): ?string
    {
        if($value)
            return asset('storage/'.$value);
        return null;
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
