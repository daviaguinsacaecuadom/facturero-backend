<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billing_id')->constrained('billings')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreignId('product_id')->constrained('products')
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::dropIfExists('billing_products');
    }
}
