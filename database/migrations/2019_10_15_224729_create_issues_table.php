<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("issues")) {
            Schema::create('issues', function (Blueprint $table) {
                $table->Increments('id');
                $table->integer('user_id')->unsigned()->index();
                $table->string('title');
                $table->boolean('status')->default(false);
                $table->integer('solved_by')->nullable()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('solved_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('issues');
    }
}
