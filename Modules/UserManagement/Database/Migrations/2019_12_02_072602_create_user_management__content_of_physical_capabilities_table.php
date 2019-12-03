<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagementContentOfPhysicalCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management__content_of_physical_capabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('system_physical_capability_id', 8);
            $table->char('system_content_capability_id', 8);
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
        Schema::dropIfExists('user_management__content_of_physical_capabilities');
    }
}
