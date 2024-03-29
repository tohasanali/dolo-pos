<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id')->unsigned();
            $table->enum('reason', ['no-reason', 'purchase', 'payment', 'adjustment', 'return'])->default('payment');
            $table->double('amount',8,2)->default(0); // +/- amount
            $table->string('note')->nullable();
            $table->date('redeem_date')->nullable();
            $table->integer('ledger_id')->unsigned()->nullable();
            $table->enum('redeem_status', ['not-redeemed', 'redeemed'])->default('not-redeemed');
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
        Schema::dropIfExists('purchase_transactions');
    }
}
