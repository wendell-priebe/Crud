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
        Schema::create('orders_sales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('dt_order');
            $table->decimal('amount', $precision = 10, $scale = 2);
            $table->decimal('discount_value', $precision = 10, $scale = 2);
            $table->decimal('freight_value', $precision = 10, $scale = 2);
            $table->string('status', 30);
            $table->string('note')->nullable();
            $table->date('dt_delivery')->nullable();
            $table->foreignUuid('cod_payment')
                ->references('id')
                ->on('payment_type');
            $table->foreignUuid('cod_client')
                ->references('id')
                ->on('clients');
            $table->foreignUuid('cod_user')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('orders_sales');
    }
};
