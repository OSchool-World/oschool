<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/education_system', function (Request $request) {
    return $request->user();
});

Route::get('/branches', "BranchController@get");

Route::post('/branches', "BranchController@save");

Route::get('/education_systems', "EducationSystemController@get");

Route::post('/education_systems', "EducationSystemController@save");

Route::post('/education_systems/{education_system_id}/grades', "EducationSystemController@saveGrade");

Route::delete('/education_systems/{education_system_id}/grades/{grade_id}', "EducationSystemController@deleteGrade");

Route::get('/education_systems/{education_system_id}/grade_groups/{grade_group_id}/grades', "EducationSystemController@getGradesOfGradeGroup");

Route::post('/education_systems/{education_system_id}/grade_groups/{grade_group_id}/grades', "EducationSystemController@saveGradesIntoGradeGroup");

Route::delete('/education_systems/{education_system_id}/grade_groups/{grade_group_id}/grades', "EducationSystemController@deleteGradesFromGradeGroup");

Route::get('/academic_years', 'AcademicYearController@get');
