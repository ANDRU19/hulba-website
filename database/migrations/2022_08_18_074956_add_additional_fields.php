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
        Schema::table('products', function (Blueprint $table) {
            $table->text('welcome_message')->nullable();
            $table->text('about_product')->nullable();
            $table->json('first_description')->nullable();
            $table->json('second_description')->nullable();
            $table->json('additional_descriotion')->nullable();
            $table->json('benefits')->nullable();
            $table->json('common_questions')->nullable();
            $table->boolean('include_join_group_info')->default(false);
            $table->boolean('include_charge_recurring_next_month_info')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
