<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('day_user')) {
            Schema::create('day_user', function (Blueprint $table) {
                $table->Increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->integer('day_id')->unsigned()->index();
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_user');
    }
}
