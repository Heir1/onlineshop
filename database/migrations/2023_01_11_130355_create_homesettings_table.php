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
        Schema::create('homesettings', function (Blueprint $table) {
            $table->id();
            $table->integer("home_service_on_off");
            $table->integer("home_welcome_on_off");
            $table->integer("home_featured_product_on_off");
            $table->integer("home_latest_product_on_off");
            $table->integer("home_popular_product_on_off");
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
        Schema::dropIfExists('homesettings');
    }
};
