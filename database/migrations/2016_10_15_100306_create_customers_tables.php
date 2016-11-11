<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('id_card');
            $table->integer('model_id');
            $table->string('telephone')->nullable();
            $table->string('vehicle_reg_number')->nullable();
            $table->string('chasis_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('rating')->nullable();
            $table->string('color')->nullable();
            $table->string('agreed_unit')->nullable();
            $table->string('on_behalf')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('amount_in_word')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('first_installment')->nullable();
            $table->string('first_installment_date')->nullable();
            $table->string('second_installment')->nullable();
            $table->string('second_installment_date')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            $table->string('file4')->nullable();
            $table->string('file5')->nullable();
            $table->string('file6')->nullable();
            $table->softDeletes();
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
        Schema::drop('customers');
    }
}
