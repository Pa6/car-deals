<?php

namespace App;

use Bican\Roles\Models\Role as TheRole;


class Role extends TheRole
{
    protected $hidden = [
        'description', 'level', 'created_at', 'updated_at',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\User');
    }
}
