<?php

namespace Modules\UserManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\UserManagement\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user = new User();
        $user->name = "root";
        $user->username = "root";
        $user->password = bcrypt("salamali");
        $user->email = "root@oschool.com";
        $user->save();
    }
}
