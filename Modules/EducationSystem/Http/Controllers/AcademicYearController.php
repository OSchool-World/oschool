<?php

namespace Modules\EducationSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\EducationSystem\Entities\AcademicYear;

class AcademicYearController extends Controller
{
    public function get()
    {
        return AcademicYear::all();
    }
}
