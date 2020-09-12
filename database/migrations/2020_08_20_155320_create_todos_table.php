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
            $table->enum('if_gst', ['our_state', 'other_state'])->nullable();
            $table->float('cgst');
            $table->float('sgst');
            $table->float('igst');
            $table->integer('selling_amount');            
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
