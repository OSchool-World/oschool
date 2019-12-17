<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'education_system__branches';

    protected $guarded = [];

    public function classrooms()
    {
        return $this->hasMany('\Modules\EducationSystem\Entities\Classroom');
    }
}
