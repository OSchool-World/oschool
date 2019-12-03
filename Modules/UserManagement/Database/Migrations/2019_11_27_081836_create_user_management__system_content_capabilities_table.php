<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagementSystemContentCapabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management__system_content_capabilities', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->string('name')->unique();
            $table->string('reference_function');
            $table->string('title')->nullable();
            $table->string('description', 512)->nullable();
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
        Schema::dropIfExists('user_management__system_content_capabilities');
    }
}
