<?php

// database/migrations/xxxx_xx_xx_create_backgrounds_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundsTable extends Migration
{
    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('backgrounds');
    }
}
