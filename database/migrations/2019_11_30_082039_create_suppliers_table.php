<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('nid_no')->nullable();
            $table->string('type')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('city');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
