<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->unsigned();
            $table->string('unique_code')->nullable();
            
            $table->enum('qty_type', ['unique', 'quantity'])->default('quantity');
            $table->integer('quantity')->default(1);
            $table->integer('sold_quantity')->default(0);
            $table->double('buying_price',8,2)->default(0);
            $table->double('selling_price',8,2)->default(0);
            $table->enum('status', ['inventory', 'sold', 'warranty', 'damaged'])->default('inventory');

            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('purchase_id')->unsigned()->nullable();

            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('sale_id')->unsigned()->nullable();

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
        Schema::dropIfExists('inventories');
    }
}
