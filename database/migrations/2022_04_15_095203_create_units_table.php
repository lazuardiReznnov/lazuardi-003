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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->foreignId('owner_id');
            $table->foreignId('models_id');
            $table->string('noReg')->unique();
            $table->string('slug')->unique();
            $table->string('vin')->nullable();
            $table->string('engineNum')->nullable();
            $table->year('year')->nullable();
            $table->string('color')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('units');
    }
};
