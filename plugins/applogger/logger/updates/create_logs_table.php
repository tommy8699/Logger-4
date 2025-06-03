<?php

namespace AppLogger\Logger\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('applogger_logs', function ($table) {
            $table->increments('id');
            $table->timestamp('arrival')->useCurrent();
            $table->string('name');
            $table->boolean('late');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applogger_logs');
    }
}
