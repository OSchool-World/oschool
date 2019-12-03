<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagementPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management__permissions', function (Blueprint $table) {
            $table->bigInteger('content_of_physical_capability_id');
            $table->char('role_id', 8);
            $table->enum('type', ['all', 'default', 'custom']);
            $table->bigInteger('reference_function_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_management__permissions');
    }
}
