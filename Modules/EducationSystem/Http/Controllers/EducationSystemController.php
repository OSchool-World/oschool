<?php

namespace Modules\EducationSystem\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\EducationSystem\Entities\EducationSystem;
use Modules\EducationSystem\Entities\Grade;

class EducationSystemController extends Controller
{
    public function get()
    {
        return EducationSystem::with(['grades', 'grade_groups'])->get();
    }

    public function save(Request $request)
    {
        EducationSystem::updateOrCreate(
            $request->only(['id']),
            $request->only([
                'title'
            ])
        );

        return "Successful!";
    }

    public function deleteGrade($education_system_id, $grade_id)
    {
        $grade = Grade::findOrFail($grade_id);
        if($grade->education_system->id != $education_system_id)
            throw new ModelNotFoundException();

        $grade->delete();

        return "Successful";
    }

    public function saveGrade($education_system_id, Request $request)
    {
        $education_system = EducationSystem::findOrFail($education_system_id);

        $education_system->grades()->updateOrCreate(
            $request->only(['id']),
            $request->only([
                'title'
            ])
        );

        return "Successful!";
    }

    public function saveGradesIntoGradeGroup($education_system_id, $grade_group_id, Request $request)
    {
        $education_system = EducationSystem::with('grade_groups')->findOrFail($education_system_id);

        $grade_group = $education_system->grade_groups->first(function ($grade_group) use($grade_group_id) {
            return $grade_group->id == $grade_group_id;
        });

        if(!$grade_group)
            throw new ModelNotFoundException();

        //TODO validate $request->ids that exists in this education_system.
        $grade_group->grades()->attach($request->ids);

        return "Successful!";
    }

    public function getGradesOfGradeGroup($education_system_id, $grade_group_id)
    {
        $education_system = EducationSystem::with('grade_groups')->findOrFail($education_system_id);

        $grade_group = $education_system->grade_groups->first(function ($grade_group) use($grade_group_id) {
            return $grade_group->id == $grade_group_id;
        });

        if(!$grade_group)
            throw new ModelNotFoundException();

        return $grade_group->grades;
    }

    public function deleteGradesFromGradeGroup($education_system_id, $grade_group_id, Request $request)
    {
        $education_system = EducationSystem::with('grade_groups')->findOrFail($education_system_id);

        $grade_group = $education_system->grade_groups->first(function ($grade_group) use($grade_group_id) {
            return $grade_group->id == $grade_group_id;
        });

        if(!$grade_group)
            throw new ModelNotFoundException();

        //TODO validate $request->ids that exists in this education_system.
        $grade_group->grades()->detach($request->ids);

        return "Successful!";
    }
}
