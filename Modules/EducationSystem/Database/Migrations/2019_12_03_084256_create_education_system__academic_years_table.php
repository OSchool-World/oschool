<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationSystemAcademicYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_system__academic_years', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('education_system_id');
            $table->string('title');
            $table->date('start_at');
            $table->date('end_at')->nullable();
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
        Schema::dropIfExists('education_system__academic_years');
    }
}
