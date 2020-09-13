<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('hsn_code');
            $table->float('cgst');
            $table->float('sgst');
            $table->float('igst');
            $table->double('selling_amount');            
            $table->integer('stock')->default(0)->nullable();            
            $table->enum('status',['active', 'inactive'])->default('active');            
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
        Schema::dropIfExists('todos');
    }
}
