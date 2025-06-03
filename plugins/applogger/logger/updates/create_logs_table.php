<?php

namespace AppLogger\Logger\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use October\Rain\Database\Schema\Blueprint;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('applogger_logger_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('arrival');
            $table->string('name');
            $table->boolean('late');
        });
    }

    public function down()
    {
        Schema::dropIfExists('applogger_logger_logs');
    }
}
