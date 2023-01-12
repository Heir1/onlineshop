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
        Schema::create('metadonnees', function (Blueprint $table) {
            $table->id();
            $table->string("meta_title_home");
            $table->mediumText("meta_keyword_home");
            $table->mediumText("meta_description_home");
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
        Schema::dropIfExists('metadonnees');
    }
};
