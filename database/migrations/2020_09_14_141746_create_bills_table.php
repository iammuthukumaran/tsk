<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number')->nullable();
            $table->string('seller_id')->nullable();
            $table->enum('bill_type', [ 'sale', 'quotation'])->nullable();
            $table->date('bill_date')->nullable();                     
            $table->double('gst_total')->default(0);
            $table->double('total')->default(0);
            $table->enum('is_billed', [ 'no', 'yes'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
