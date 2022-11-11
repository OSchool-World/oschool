<?php

namespace Modules\EducationSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\EducationSystem\Entities\Branch;

class BranchController extends Controller
{
    public function get()
    {
        return Branch::all();
    }

    public function save(Request $request)
    {
        Branch::updateOrCreate(
            $request->only(['id']),
            $request->only([
                'name',
                'address'
            ])
        );

        return "Successful!";
    }
}
