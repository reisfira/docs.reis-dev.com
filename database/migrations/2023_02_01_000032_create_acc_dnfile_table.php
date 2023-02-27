<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccDnfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_dnfile', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('doc_no')->index();
            $table->string('description')->nullable();
            $table->text('path');

            $table->integer('post_id')->unsigned()->nullable();
            $table->string('post_by')->index()->nullable();
            $table->datetime('post_datetime')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acc_dnfile');
    }
}
