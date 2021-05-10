<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('price');
            $table->string('category');
            $table->integer('no_pickups');
            $table->integer('advance_notice');
            $table->integer('bags_per_pickup');
            $table->integer('return_service');
            $table->string('washing_option');
            $table->string('dryer_option');
            $table->foreignId('detergent_id')->on('detergents');
            $table->string('laundry_softener');
            $table->foreignId('fabric_id')->on('fabrics')->nullable();
            $table->foreignId('scent_id')->on('scents')->nullable();
            $table->foreignId('dryer_id')->on('dryers')->nullable();
            $table->foreignId('freshener_id')->on('fresheners')->nullable();
            $table->decimal('dry_clean_credit')->default(0);
            $table->decimal('house_hold_credit')->default(0);
            $table->decimal('added_value_service')->default(0);
            $table->integer('reward_points')->default(0);
            $table->decimal('price_of_extra_pound')->default(0);

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
        Schema::dropIfExists('packages');
    }
}
