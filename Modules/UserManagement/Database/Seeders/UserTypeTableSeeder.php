<?php

namespace Modules\UserManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\UserManagement\Entities\UserType;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user_types = [
            'owner'    => null,
            'admin'    => null,
            'employee' => '\Modules\EmployeeManagement\Entity\Employee',
            'student'  => '\Modules\StudentManagement\Entity\Student',
            'parent'   => '\Modules\StudentManagement\Entity\Parent',
        ];

        foreach ($user_types as $user_type => $entity) {
            UserType::create([
                'title' => $user_type,
                'entity' => $entity
            ]);
        }
    }
}
