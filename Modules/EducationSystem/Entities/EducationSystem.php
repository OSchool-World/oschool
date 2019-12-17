<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class EducationSystem extends Model
{
    protected $table = 'education_system__education_systems';

    protected $guarded = [];

    public function grades()
    {
        return $this->hasMany('\Modules\EducationSystem\Entities\Grade');
    }

    public function grade_groups()
    {
        return $this->hasMany('\Modules\EducationSystem\Entities\GradeGroup');
    }

    public function academic_years()
    {
        return $this->hasMany('\Modules\EducationSystem\Entities\AcademicYear');
    }
}
