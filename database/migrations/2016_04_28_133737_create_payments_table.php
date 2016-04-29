<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceno');
            $table->date('invoicedate');
            $table->string('terms');
            $table->date('duedate');
            $table->string('billto');
            $table->string('description');
            $table->string('quantity');
            $table->string('price');
            $table->string('amount');
            $table->string('subtotal');
            $table->string('total');
            $table->string('notes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
