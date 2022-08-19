<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_bussiness_details', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code');
            $table->string('address');
            $table->string('neighborhood');
            $table->string('number');
            $table->string('add_on');
            $table->string('city');
            $table->string('state');
            $table->string('fullname');
            $table->string('description');
            $table->string('bank');
            $table->string('agency');
            $table->string('account');
            $table->string('account_type');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('customer_bussiness_detail');
    }
};
