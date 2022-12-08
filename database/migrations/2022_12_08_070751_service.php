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
        Schema::create('services', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('_id')->unique();
            $table->string('title')->index();
            $table->double('cost');
            $table->integer('min_order');
            $table->integer('max_order');
            $table->boolean('refill');
            $table->boolean('cancel');
            $table->string('type');
            $table->string('category');
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
        //
    }
};
