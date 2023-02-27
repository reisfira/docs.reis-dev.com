<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartOfAccountTable extends Migration
{
    /**
     * For ordering, purpose,
     *  - chart of account will always use the order according to the classification
     *  - subheading will use sqn column, e.g.: (1,2,3,4,5)
     *  - ledgers will use sqn column, e.g.: (10,20,30,40) -> always display in padded format: (0010, 0020, 0030, 0040, 0050)
     *      - the reason is to allow more flexibility to rearrange the position of the ledgers
     * */
    public function up()
    {
        Schema::create('chart_of_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->index()->comment('Prefix: C : C00001');
            $table->string('description')->nullable();
            $table->string('classification')->index()->comment('FA | CA | OA | CL | OL | LL | OL | SF | IN | CI | EX');
            $table->string('type')->index()->comment('Balance Sheet | Profit-Loss');

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('chart_of_account_sub', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sqn')->default(0)->comment('increment of 1');
            $table->string('chart_of_account_code')->index()->comment('link to chart_of_account');
            $table->string('code')->index()->comment('Prefix: CS : CS0001');
            $table->string('description')->nullable();

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('general_ledger', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sqn')->default(0)->comment('increment of 10');
            $table->string('chart_of_account_code')->index()->comment('link to `chart_of_account`');
            $table->string('chart_of_account_sub_code')->index()->nullable()->comment('link to `chart_of_account_sub`');
            $table->string('account_code')->index()->comment('5 digit: 10001');
            $table->string('ccentre_code')->index()->comment('2 digit: 00');
            $table->string('full_code')->index()->comment('5-2 digit: 10001-00');
            $table->string('description')->nullable();
            $table->decimal('opening')->default(0);
            $table->decimal('last_year_balance')->default(0);
            $table->string('tax_code')->nullable()->index()->comment('link to tax_code');
            $table->string('mi_code')->nullable()->index()->comment('link to tariff_code');
            $table->string('mark')->nullable()->index()->comment('marking for reporting');
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
        Schema::dropIfExists('chart_of_account');
        Schema::dropIfExists('chart_of_account_sub');
        Schema::dropIfExists('general_ledger');
    }
}
