<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class AcademicYearIncludedGrade extends Model
{
    protected $table = 'education_system__academic_year_included_grades';

    public function grade()
    {
        return $this->hasOne('\Modules\EducationSystem\Entities\Grade');
    }

    public function academic_year()
    {
        return $this->hasOne('\Modules\EducationSystem\Entities\AcademicYear');
    }

    public function classrooms()
    {
        return $this->hasMany('\Modules\EducationSystem\Entities\Classroom');
    }
}
