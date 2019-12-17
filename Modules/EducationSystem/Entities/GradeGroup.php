<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class GradeGroup extends Model
{
    protected $table = 'education_system__grade_groups';

    protected $hidden = ['pivot'];

    public function education_system()
    {
        return $this->belongsTo('\Modules\EducationSystem\Entities\EducationSystem');
    }

    public function grades()
    {
        return $this->belongsToMany('\Modules\EducationSystem\Entities\Grade','education_system__grade_grade_group');
    }
}
