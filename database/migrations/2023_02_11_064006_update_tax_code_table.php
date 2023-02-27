<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTaxCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tax_code');
        Schema::create('tax_code', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('type')->index()->nullable();
            $table->string('description')->nullable();
            $table->string('category')->index()->nullable();
            $table->decimal('rate')->default(0);
            $table->string('transaction_type')->index()->nullable()->comment('purchase | sales');
            $table->string('account_code')->index();
            $table->boolean('active')->default(true);
            $table->string('tariff_code')->index()->nullable();

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
        Schema::dropIfExists('tax_code');
        Schema::create('tax_code', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
