<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    /**
     * Attaches the given Permission to the Role
     *
     * @param $permission
     * @return void
     */
    public function allowTo($permission)
    {
        if (is_string($permission))
            $permission = Permission::whereName($permission)->first();

        $this->permissions()->sync($permission, false);
    }
}
