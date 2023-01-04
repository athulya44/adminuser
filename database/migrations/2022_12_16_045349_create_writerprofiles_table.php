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
        Schema::create('writerprofiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('writer_id')->unique();
            $table->string('age');
            $table->string('qualification');
            $table->string('level');
            $table->string('phone');
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
        Schema::dropIfExists('writerprofiles');
    }
};
