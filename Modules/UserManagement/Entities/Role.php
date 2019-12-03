<?php

namespace Modules\UserManagement\Entities;

use App\Tools\Models\RandomHexId;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use RandomHexId;

    protected $table = 'user_management__roles';

    public function users()
    {
        return $this->belongsToMany('Modules\UserManagement\Entities\User');
    }

    public function permissions()
    {
        return $this->hasMany('Modules\UserManagement\Entities\Permission');
    }
}
