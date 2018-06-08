c<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::defaultStringLength(191);
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_type');
            $table->string('client');
            $table->string('staff');
            $table->date('start_date');
            $table->date('expected_completion_date');
            $table->date('due_date');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tasks');
    }
}
