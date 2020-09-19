<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->enum('user_type',['buyer','seller','admin'])->default('admin');
            $table->enum('gst_type', [ 'our_state', 'other_state'])->nullable();
            $table->string('phone')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('shop_address')->nullable();
            $table->text('bank_details')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();                        
            $table->enum('status',['active', 'inactive'])->default('active'); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
