<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_management__user_types';

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_management__user_type_user')->withPivot('entity_id');
    }
}
