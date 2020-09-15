<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('bill_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('hsn_code');
            $table->float('cgst')->nullable();
            $table->float('sgst')->nullable();
            $table->float('igst')->nullable();
            $table->integer('quantity')->default(0);
            $table->double('selling_price')->default(0);
            $table->double('total')->default(0);
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
        Schema::dropIfExists('sales');
    }
}
