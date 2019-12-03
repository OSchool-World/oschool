<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagementSystemPhysicalCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management__system_physical_capabilities', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->char('module_id', 8);
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('description', 512)->nullable();
            $table->integer('sort_order', 512)->nullable();
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
        Schema::dropIfExists('user_management__system_physical_capabilities');
    }
}
