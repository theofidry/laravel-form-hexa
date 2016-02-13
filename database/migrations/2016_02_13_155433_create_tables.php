<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'customers',
            function (Blueprint $table) {
                $table->uuid('id');
                $table->string('name');
                $table->string('email');

                $table->primary('id');
                $table->unique('email');

                $table->index('email');
            }
        );

        Schema::create(
            'appointments',
            function (Blueprint $table) {
                $table->uuid('id');
                $table->timestamp('datetime');
                $table->uuid('customer_id');

                $table->primary('id');
                $table->foreign('customer_id')->references('id')->on('customers');

                $table->index('customer_id');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointments');
        Schema::drop('customers');
    }
}
