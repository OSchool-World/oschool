<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class SystemContentCapability extends Model
{
    protected $table = 'user_management__system_content_capabilities';

    public function content_of_physical_capabilities()
    {
        return $this->hasMany('Modules\UserManagement\Entities\ContentOfPhysicalCapability');
    }

    public function users()
    {
        return $this->belongsToMany('Modules\UserManagement\Entities\User', 'user_management__user_default_content_permissions')->withPivot(['type', 'reference_function_value']);
    }
}
