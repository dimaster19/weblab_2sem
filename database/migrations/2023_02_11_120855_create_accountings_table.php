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
            $table->bigInteger('Course')->nullable();
            $table->string('Group')->nullable();
            $table->string('Subject')->nullable();
            $table->bigInteger('Lectures')->nullable();
            $table->bigInteger('Practices')->nullable();
            $table->bigInteger('Labs')->nullable();
            $table->bigInteger('Moduls')->nullable();
            $table->bigInteger('Consultations_Sem')->nullable();
            $table->bigInteger('Consultations_Ex')->nullable();
            $table->bigInteger('Tests')->nullable();
            $table->bigInteger('CourseWorks')->nullable();
            $table->bigInteger('DiplomasBak')->nullable();
            $table->bigInteger('DiplomasSpec')->nullable();
            $table->bigInteger('DiplomasMag')->nullable();
            $table->bigInteger('PracticeManagements')->nullable();
            $table->bigInteger('StateExams')->nullable();
            $table->bigInteger('TotalHours')->nullable();
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
