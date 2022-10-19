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
        Schema::create('assigneds', function (Blueprint $table) {
            $table->id();
            $table->string('error_name');
            $table->string('error_description');
            $table->string('error_steps');
            $table->string('error_reporter');
            $table->string('error_priority');
            $table->string('error_dev_assigned');
            $table->integer('error_steps_done');
            $table->integer('error_steps_to_complete');
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
        Schema::dropIfExists('assigneds');
    }
};
