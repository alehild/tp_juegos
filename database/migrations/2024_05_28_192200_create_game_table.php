<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {

        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->year('year');
            $table->decimal('precio', 8, 2);
            $table->string('consola')->nullable();
            $table->timestamps();
            $table->string('imagen');
        });
    }


    public function down()
    {
        Schema::dropIfExists('games');
    }
};
