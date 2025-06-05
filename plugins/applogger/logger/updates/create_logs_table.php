<?php

namespace AppLogger\Logger\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration
{
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

    public function down()
    {
        Schema::dropIfExists('applogger_logger_logs');
    }
}
