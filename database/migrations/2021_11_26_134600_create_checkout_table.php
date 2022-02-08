<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->string('name');
            $table->foreign('name')->references('name')->on('book.users');
            $table->string('email');
            $table->foreign('user_email')->references('email')->on('book.users');
            $table->integer('phone');
            $table->string('address', 200)->nullable();
            $table->string('city');
            $table->string('notes');
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
        Schema::dropIfExists('checkout');
    }
}
