<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccInvdtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_invdt', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('doc_no')->index();
            $table->string('sequence_no', 4)->nullable();
            $table->string('account_code')->nullable()->index();
            $table->string('item_code')->nullable()->index();
            $table->string('description')->nullable();
            $table->text('details')->nullable();

            $table->decimal('quantity', 14, 4)->nullable();
            $table->string('uom')->nullable();
            $table->decimal('uom_rate', 14, 4)->default(0)->nullable();
            $table->decimal('unit_price', 15, 4)->nullable();
            $table->boolean('discount_is_percentage')->default(false);
            $table->decimal('discount_rate', 15, 4)->default(0);
            $table->decimal('discount', 15, 4)->nullable();
            $table->decimal('amount', 15, 4)->nullable();
            $table->string('tax_code')->nullable()->index();
            $table->decimal('tax_rate', 5, 2)->default(0);
            $table->decimal('tax_amount', 15, 4)->default(0);
            $table->decimal('subtotal', 15, 4)->default(0);

            $table->decimal('exchange_rate', 10, 4)->nullable();
            $table->string('batch_no')->nullable()->index();
            $table->date('bank_recon_date')->nullable();

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
        Schema::dropIfExists('acc_invdt');
    }
}
