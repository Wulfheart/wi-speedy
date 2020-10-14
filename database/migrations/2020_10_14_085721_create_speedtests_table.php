<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeedtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speedtests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tested_at');
            $table->decimal('upload', 64, 10);
            $table->decimal('download', 64, 10);
            $table->decimal('ping', 64, 10)->nullable();
            $table->json('result')->nullable();
            $table->decimal('duration', 64, 10);
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
        Schema::dropIfExists('speedtests');
    }
}
