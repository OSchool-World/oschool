<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $table = 'education_system__academic_years';

    public function education_system()
    {
        return $this->belongsTo('\Modules\EducationSystem\Entities\EducationSystem');
    }

    public function grades()
    {
        return $this->belongsToMany('\Modules\EducationSystem\Entities\Grade', 'education_system__academic_year_included_grades');
    }
}
