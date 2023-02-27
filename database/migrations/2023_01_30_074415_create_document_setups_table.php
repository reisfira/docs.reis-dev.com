<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentSetupsTable extends Migration
{
    /**
     * NOTES regarding the date_format:

     *  * 2020/12/31
        'Y/m/d',
        'Y/m',
        'Y',

     *  * 20/12/31
        'y/m/d',
        'y/m',
        'y',

     *  * 2020-12-31
        'Y-m-d',
        'Y-m',
        'Y',

     *  * 20-12-31
        'y-m-d',
        'y-m',
        'y',
     * */
    public function up()
    {
        Schema::create('document_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('Invoice / Cash Bill / etc...');
            $table->string('prefix')->comment('IV / INV / CB / DN / GR');
            $table->string('type')->comment('simple | date | salesman | dbcr | dbcr-date | manual');
            $table->string('date_format')->default()->nullable()->comment('refer to notes in migration: 2023_01_30_074415_create_document_setups_table');
            $table->string('separator')->nullable()->default('/')->comment('Symbols in between prefx and running numbers: / | -');
            $table->integer('last_no')->default(0)->comment('Last running no');
            $table->integer('zeroes')->default(4)->comment('how many zeroes in the running number? Fill by sprintf');
            $table->boolean('active')->default(true)->comment('if this is active, running number is auto generated, otherwise, Doc No field in bills need to manually fill in');

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
        Schema::dropIfExists('document_setups');
    }
}
