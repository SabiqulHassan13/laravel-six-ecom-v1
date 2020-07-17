<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->string('customer_name');
            $table->string('customer_phone_no');
            $table->text('address');
            $table->string('city');
            $table->string('postal_code');
            $table->decimal('total_amount');
            $table->decimal('discount_amount')->default(0.00);
            $table->decimal('paid_amount');
            $table->string('operation_status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->text('payment_details')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('processed_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
