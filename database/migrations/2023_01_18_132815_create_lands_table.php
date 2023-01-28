<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('desired_price');
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('width');
            $table->unsignedBigInteger('length');
            $table->string('tract_no');
            $table->string('nature');
            $table->string('address');
            $table->string('description')->nullable();
            $table->string('image')->nullable();

            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
            $table->foreignId('landscape_id')->nullable()->constrained('landscapes');
            $table->foreignId('direction_id')->nullable()->constrained('land_directions');
            $table->foreignId('site_description_id')->nullable()->constrained('land_site_descriptions');

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
        Schema::dropIfExists('landes');
    }
};
