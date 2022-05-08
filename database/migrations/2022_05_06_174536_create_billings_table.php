<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('num_invoice')->nullable();
            $table->enum('type', ['Factura', 'Rompe'])->default('Factura');
            $table->enum('status',['Pagado','No Pagado'])->default('No Pagado');
            $table->double('mount',8,2)->nullable();
            $table->text('signature')->nullable();
            $table->foreignId('user_id')->nulleable()->constrained('users')->onDelete("cascade")
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
        Schema::dropIfExists('billings');
    }
}
