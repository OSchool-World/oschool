<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class ContentOfPhysicalCapability extends Model
{
    protected $table = 'user_management__content_of_physical_capabilities';

    public function permissions()
    {
        return $this->hasMany('Modules\UserManagement\Entities\Permission');
    }

    public function system_physical_capability()
    {
        return $this->belongsTo('Modules\UserManagement\Entities\SystemPhysicalCapability');
    }

    public function system_content_capability()
    {
        return $this->belongsTo('Modules\UserManagement\Entities\SystemContentCapability');
    }
}
