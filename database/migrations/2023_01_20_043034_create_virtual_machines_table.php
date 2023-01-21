<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_machines', function (Blueprint $table) {
            $table->id();
            $table->string('title',20);
            $table->time('lifetime');
            $table->bigInteger('minimum_invest');
            $table->bigInteger('distribute_coin');
            $table->time('execution_time');
            $table->time('prepration_time');
            $table->dateTime('start_time');
            $table->bigInteger('winning_amount');
            $table->string('status',20);
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
        Schema::dropIfExists('virtual_machines');
    }
}
