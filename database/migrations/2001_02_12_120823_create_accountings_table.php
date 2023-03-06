<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountings', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('Course')->nullable();
            $table->string('Group')->nullable();
            $table->string('Subject')->nullable();
            $table->smallInteger('Lectures')->nullable();
            $table->smallInteger('Practices')->nullable();
            $table->smallInteger('Labs')->nullable();
            $table->smallInteger('Moduls')->nullable();
            $table->smallInteger('Consultations_Sem')->nullable();
            $table->smallInteger('Consultations_Ex')->nullable();
            $table->smallInteger('Tests')->nullable();
            $table->smallInteger('CourseWorks')->nullable();
            $table->smallInteger('DiplomasBak')->nullable();
            $table->smallInteger('DiplomasSpec')->nullable();
            $table->smallInteger('DiplomasMag')->nullable();
            $table->smallInteger('PracticeManagements')->nullable();
            $table->smallInteger('StateExams')->nullable();
            $table->smallInteger('TotalHours')->nullable();
            $table->string('Month')->nullable();
            $table->string('Type')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountings');
    }
};
