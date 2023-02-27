<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbcrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debtor', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('account_code')->comment('Account Code: DA001 | DA002 | DB001. This cannot be unique because will duplicate when creating for another cost centre.')->index();
            $table->string('ccentre_code')->comment('Cost Centre Code: 00 | 01 | 99. Normally used together with D_ACODE like DA0001-00 to denote this debtor is for this cost centre')->index();
            $table->string('full_code')->index();
            $table->boolean('is_trade_account')->default(true)->comment('true (Trade Debtor) | false (Other Debtor)');
            $table->boolean('generate_interest')->default(false)->comment('Generate Interest: Y | N');
            $table->boolean('email_state_of_account')->default(true)->comment('Email Statement of Account: Y | N');

            $table->string('name')->comment('The first letter will will be used to generate D_ACODE. i.e.: ANGKATAN TENTERA will be DA00X');
            $table->string('addr1')->nullable();
            $table->string('addr2')->nullable();
            $table->string('addr3')->nullable();
            $table->string('addr4')->nullable();
            $table->string('tel_no')->nullable()->index()->comment('Tel: +6088-123456');
            $table->string('fax_no')->nullable()->index()->comment('Fax: +6088-123654');
            $table->string('hp_no')->nullable()->index()->comment('Phone: +6013-1231234');
            $table->string('email')->nullable()->index()->comment('Email: example@email.com');
            $table->string('brn_no')->nullable()->index();

            $table->string('contact_person')->nullable()->index()->comment('Contact Person: John Doe');
            $table->string('contact_person_tel_no')->nullable()->comment('Contact Number: +6011-1234567 | +6088-123456');
            $table->string('contact_person_position')->nullable()->comment('Contact Person Position: Salesman / Executive / President');
            $table->string('area_code')->nullable()->nullable();
            $table->string('salesman_code')->nullable();
            $table->string('salesman_name')->nullable()->comment('in most cases, there\'s no salesman module in the accounting system - but useful for stock posting');
            $table->string('currency_code')->index()->default('RM');

            $table->string('credit_term')->nullable();
            $table->integer('credit_term_days')->default(0)->comment('Credit Term: 30 | 60 | 90. To prevent from mixing the \'30\' and \'30 DAYS\'.');
            $table->decimal('credit_limit', 15, 2)->default(0.00)->comment('Credit Limit: 10,000.00');

            $table->decimal('opening', 15, 2)->default(0)->comment('Financial Year Opening: this should be only modified when doing account closing');
            $table->string('mark')->nullable()->index()->comment('marking for reporting');
            $table->text('memo')->nullable()->comment('For notary purposes, usually left blank');

            $table->string('gst_no')->nullable()->index();
            $table->string('gst_code')->nullable()->index();
            $table->date('gst_vdate')->nullable()->index();
            $table->string('misc')->nullable();

            $table->string('reference')->index()->nullable()->comment('primary key data imported from 3rd party softwares will key into here for reference');
            $table->string('reference_remark')->nullable()->comment('additional reference - not for search purpose');
            $table->boolean('active')->default(true);
            $table->boolean('commission_special_case')->default(false)->comment('Only used for commission calculation: special case to give commission to salesman even if the debtor transaction overdue the credit term');

            $table->string('created_by')->index()->nullable();
            $table->string('updated_by')->index()->nullable();
            $table->string('deleted_by')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('creditor', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('account_code')->comment('Account Code: DA001 | DA002 | DB001. This cannot be unique because will duplicate when creating for another cost centre.')->index();
            $table->string('ccentre_code')->comment('Cost Centre Code: 00 | 01 | 99. Normally used together with D_ACODE like DA0001-00 to denote this debtor is for this cost centre')->index();
            $table->string('full_code')->index();
            $table->boolean('is_trade_account')->default(true)->comment('true (Trade Creditor) | false (Other Creditor)');
            $table->boolean('generate_interest')->default(false)->comment('Generate Interest: Y | N');
            $table->boolean('email_state_of_account')->default(true)->comment('Email Statement of Account: Y | N');

            $table->string('name')->comment('The first letter will will be used to generate D_ACODE. i.e.: ANGKATAN TENTERA will be DA00X');
            $table->string('addr1')->nullable();
            $table->string('addr2')->nullable();
            $table->string('addr3')->nullable();
            $table->string('addr4')->nullable();
            $table->string('tel_no')->nullable()->index()->comment('Tel: +6088-123456');
            $table->string('fax_no')->nullable()->index()->comment('Fax: +6088-123654');
            $table->string('hp_no')->nullable()->index()->comment('Phone: +6013-1231234');
            $table->string('email')->nullable()->index()->comment('Email: example@email.com');
            $table->string('brn_no')->nullable()->index();

            $table->string('contact_person')->nullable()->index()->comment('Contact Person: John Doe');
            $table->string('contact_person_tel_no')->nullable()->comment('Contact Number: +6011-1234567 | +6088-123456');
            $table->string('contact_person_position')->nullable()->comment('Contact Person Position: Salesman / Executive / President');
            $table->string('area_code')->nullable()->nullable();
            $table->string('salesman_code')->nullable();
            $table->string('salesman_name')->nullable()->comment('in most cases, there\'s no salesman module in the accounting system - but useful for stock posting');
            $table->string('currency_code')->index()->default('RM');

            $table->string('credit_term')->nullable();
            $table->integer('credit_term_days')->default(0)->comment('Credit Term: 30 | 60 | 90. To prevent from mixing the \'30\' and \'30 DAYS\'.');
            $table->decimal('credit_limit', 15, 2)->default(0.00)->comment('Credit Limit: 10,000.00');

            $table->decimal('opening', 15, 2)->default(0)->comment('Financial Year Opening: this should be only modified when doing account closing');
            $table->string('mark')->nullable()->index()->comment('marking for reporting');
            $table->text('memo')->nullable()->comment('For notary purposes, usually left blank');

            $table->string('gst_no')->nullable()->index();
            $table->string('gst_code')->nullable()->index();
            $table->date('gst_vdate')->nullable()->index();
            $table->string('misc')->nullable();

            $table->string('reference')->index()->nullable()->comment('primary key data imported from 3rd party softwares will key into here for reference');
            $table->string('reference_remark')->nullable()->comment('additional reference - not for search purpose');
            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('debtor');
        Schema::dropIfExists('creditor');
    }
}
