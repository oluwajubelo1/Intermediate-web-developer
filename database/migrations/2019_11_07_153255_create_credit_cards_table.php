<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable(('credit_cards'))) {
            Schema::create('credit_cards', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('customer_id');
                $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->string('number');
                $table->string('expire');
                $table->string('brand');
                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_cards');
    }
}
