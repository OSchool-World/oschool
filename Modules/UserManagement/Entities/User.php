<?php

namespace Modules\UserManagement\Entities;

use App\Tools\Models\RandomHexId;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nwidart\Modules\Facades\Module;

class User extends Authenticatable
{
    use Notifiable, RandomHexId;

    protected $table = 'user_management__users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function types()
    {
        return $this->belongsToMany('Modules\UserManagement\Entities\UserType', 'user_management__user_type_user')->withPivot('entity_id');
    }

    public function hasType($user_type)
    {
        //TODO
    }

    public function roles()
    {
        return $this->belongsToMany('Modules\UserManagement\Entities\Role');
    }

    public function default_system_content_capability()
    {
        return $this->belongsToMany('Modules\UserManagement\Entities\SystemContentCapability', 'user_management__user_default_content_permissions')->withPivot(['type', 'reference_function_value']);
    }
}
