<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccRvmtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_rvmt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_no')->unique();
            $table->date('date')->index();
            $table->date('payment_date')->nullable()->index();
            $table->string('batch_no')->nullable();

            $table->decimal('received_amount', 15, 4)->nullable();
            $table->decimal('remaining_amount', 15, 4)->nullable();
            $table->decimal('foreign_gain_loss', 15, 4)->nullable();
            $table->decimal('bank_charges', 15, 4)->nullable();

            $table->string('dbcr_code')->index();
            $table->string('name')->nullable();
            $table->string('addr1')->nullable();
            $table->string('addr2')->nullable();
            $table->string('addr3')->nullable();
            $table->string('addr4')->nullable();
            $table->string('email')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('credit_term')->nullable();
            $table->integer('credit_term_days')->unsigned()->default(0)->nullable();

            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->text('summary')->nullable();

            $table->string('gl_description')->nullable();
            $table->string('currency')->default('RM')->nullable();
            $table->decimal('exchange_rate', 10, 4)->default(0)->nullable();
            $table->text('delete_reason')->nullable();
            $table->date('bank_recon_date')->nullable();

            $table->string('reference')->nullable();
            $table->string('salesman_code')->index()->nullable();

            // for stock posting
            $table->integer('post_id')->unsigned()->nullable();
            $table->string('post_by')->index()->nullable();
            $table->datetime('post_datetime')->nullable();

            // create/delete
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
        Schema::dropIfExists('acc_rvmt');
    }
}
