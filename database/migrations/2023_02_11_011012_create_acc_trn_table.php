<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccTrnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_trn', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('acc_id')->unsigned()->nullable()->index();
            $table->string('acc_type')->nullable()->index();
            $table->string('doc_no')->index();
            $table->date('date')->nullable();
            $table->string('doc_type')->index();
            $table->string('batch_no')->nullable()->index();
            $table->string('term')->nullable();
            $table->string('line_no')->nullable();
            $table->string('bill_no')->nullable()->index();
            $table->string('account_code')->nullable()->index();
            $table->string('account_code_type')->nullable();
            $table->string('description')->nullable();
            
            $table->decimal('debit', 15, 4)->nullable();
            $table->decimal('credit', 15, 4)->nullable();
            $table->decimal('debit_currency', 15, 4)->nullable();
            $table->decimal('credit_currency', 15, 4)->nullable();
            $table->string('currency')->nullable()->default('RM');
            $table->decimal('exchange_rate', 10, 4)->nullable();

            $table->string('tax_code')->nullable()->index();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->decimal('tax_amount', 14, 2)->nullable();
            $table->date('tax_date')->nullable();
            
            $table->string('project_code')->nullable()->index();
            $table->string('reference_no')->nullable();
            $table->string('tariff_code')->nullable()->index();


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
        Schema::dropIfExists('acc_trn');
    }
}
