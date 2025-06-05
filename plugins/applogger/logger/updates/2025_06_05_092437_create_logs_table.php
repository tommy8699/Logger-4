<?php

use October\Rain\Database\Updates\Migration;
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
        Schema::create('applogger_logger_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('arrival')->nullable();
            $table->string('name');
            $table->boolean('late')->default(false);
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
        Schema::dropIfExists('applogger_logger_logs');
    }
};
