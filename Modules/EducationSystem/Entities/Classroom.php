<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'education_system__classrooms';

    public function academic_year_included_grade()
    {
        return $this->belongsTo('\Modules\EducationSystem\Entities\AcademicYearIncludedGrade');
    }

    public function branch()
    {
        return $this->belongsTo('\Modules\EducationSystem\Entities\Branch');
    }
}
