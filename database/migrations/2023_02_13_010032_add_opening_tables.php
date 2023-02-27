<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOpeningTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_opening', function(Blueprint $table) {
            $table->increments('id');
            $table->string('doc_no')->unique();
            $table->string('account_code')->index()->comment('this could be either debtor/creditor');
            $table->boolean('is_debtor')->default(true);
            $table->date('date')->index();
            $table->string('description')->nullable();
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->decimal('amount')->default(0);
            $table->decimal('remaining_amount')->default(0);

            // create/delete
            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('acc_opaymt', function(Blueprint $table) {
            $table->increments('id');
            $table->string('doc_no')->unique();
            $table->string('account_code')->index()->comment('this could be either debtor/creditor');
            $table->boolean('is_debtor')->default(true);
            $table->date('date')->index();
            $table->date('recon_date')->index()->nullable();
            $table->string('description')->nullable();
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->decimal('amount')->default(0);
            $table->decimal('remaining_amount')->default(0);

            // create/delete
            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('acc_opaydt', function(Blueprint $table) {
            $table->increments('id');
            $table->string('doc_no')->index();
            $table->date('date')->index();
            $table->date('recon_date')->index()->nullable();
            $table->string('offset_bill_no')->index()->nullable();
            $table->string('description')->nullable();
            $table->decimal('amount')->default(0);

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
        Schema::dropIfExists('acc_opening');
        Schema::dropIfExists('acc_opaymt');
        Schema::dropIfExists('acc_opaydt');
    }
}
