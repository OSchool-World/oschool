<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'user_management__permissions';

    public function role()
    {
        return $this->belongsTo('Modules\UserManagement\Entities\Role');
    }

    public function content_of_physical_capability()
    {
        return $this->belongsTo('Modules\UserManagement\Entities\ContentOfPhysicalCapability');
    }
}
