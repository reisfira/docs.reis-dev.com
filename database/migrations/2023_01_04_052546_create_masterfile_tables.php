<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterfileTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_centre', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('area', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('salesman', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable()->comment('use this field to store name');

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('currency', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('exchange_rate', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('currency_code')->index();
            $table->string('term')->index();
            $table->decimal('rate')->default(0);

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('industrial_classification', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tariff_code', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

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

        Schema::create('payment_method', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('account_code')->index()->comment('link back to General Ledger');
            $table->string('description')->index()->nullable();
            $table->string('type')->index()->comment('Online | Cheque | Cash');

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('item', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();
            $table->text('detail')->nullable();
            $table->string('uom')->nullable();
            $table->decimal('cost', 15, 4)->default(0);
            $table->decimal('price', 15, 4)->default(0);

            $table->string('account_cash_sales')->index()->nullable()->comment('CB');
            $table->string('account_credit_sales')->index()->nullable()->comment('IV | DN');
            $table->string('account_cash_sales_return')->index()->nullable()->comment('CN - Ref: CB');
            $table->string('account_credit_sales_return')->index()->nullable()->comment('CB - Ref: IV');
            $table->string('account_cash_purchase')->index()->nullable()->comment('CP');
            $table->string('account_credit_purchase')->index()->nullable()->comment('PIV');
            $table->string('account_cash_purchase_return')->index()->nullable()->comment('SC - Ref: CP');
            $table->string('account_credit_purchase_return')->index()->nullable()->comment('SC - Ref: PIV');

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('code')->index();
            $table->string('description')->nullable();
            $table->string('staff_id')->index()->nullable();
            $table->string('staff_email')->nullable();
            $table->string('staff_password')->nullable();
            $table->boolean('staff_is_active')->default(true);

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
        Schema::dropIfExists('cost_centre');
        Schema::dropIfExists('area');
        Schema::dropIfExists('salesman');
        Schema::dropIfExists('currency');
        Schema::dropIfExists('exchange_rate');
        Schema::dropIfExists('industrial_classification');
        Schema::dropIfExists('tariff_code');
        Schema::dropIfExists('tax_code');
        Schema::dropIfExists('payment_method');
        Schema::dropIfExists('item');
        Schema::dropIfExists('employee');
    }
}
