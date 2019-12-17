<?php

namespace Modules\EducationSystem\Entities;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'education_system__grades';

    protected $guarded = [];

    protected $hidden = ['pivot'];

    public function education_system()
    {
        return $this->belongsTo('\Modules\EducationSystem\Entities\EducationSystem');
    }

    public function grade_groups()
    {
        return $this->belongsToMany('\Modules\EducationSystem\Entities\GradeGroup', 'education_system__grade_grade_group');
    }

    public function academic_years()
    {
        return $this->belongsToMany('\Modules\EducationSystem\Entities\AcademicYear', 'education_system__academic_year_included_grades');
    }
}
