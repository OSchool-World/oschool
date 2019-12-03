<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class SystemPhysicalCapability extends Model
{
    protected $table = 'user_management__system_physical_capabilities';

    public function content_of_physical_capabilities()
    {
        return $this->hasMany('Modules\UserManagement\Entities\ContentOfPhysicalCapability');
    }
}
