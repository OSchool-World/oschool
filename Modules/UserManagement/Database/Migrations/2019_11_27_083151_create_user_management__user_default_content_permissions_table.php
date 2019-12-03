<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagementUserDefaultContentPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management__user_default_content_permissions', function (Blueprint $table) {
            $table->char('system_content_capability_id', 8);
            $table->char('user_id', 8);
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
        Schema::dropIfExists('user_management__user_default_content_permissions');
    }
}
