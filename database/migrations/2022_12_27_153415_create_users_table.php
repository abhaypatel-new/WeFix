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
            $table->integer('roleid')->nullable();
            $table->string('email')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('company')->nullable();
            $table->string('category')->nullable();
            $table->string('city')->nullable();
            $table->string('desc')->nullable();
            $table->string('image')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('street_address')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->string('house_no')->nullable();
            $table->string('apartment_no')->nullable();
            $table->string('cm_firebase_token')->nullable();
            $table->string('payment_card_last_four')->nullable();
            $table->string('payment_card_brand')->nullable();
            $table->string('login_medium')->nullable();
            $table->string('social_id')->nullable();
            $table->string('is_phone_verified')->nullable();
            $table->string('device_id')->nullable();
            $table->string('district_name')->nullable();
            $table->integer('is_email_verified')->nullable();
            $table->integer('is_active')->nullable();       
            $table->integer('created_by')->nullable();       
            $table->string('approval_limit')->nullable();       
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
