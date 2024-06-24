<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestsTable extends Migration
{
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('due_date');
            $table->boolean('completed')->default(false);
            $table->dateTime('completed_at')->nullable();
            $table->integer('exp')->default(0);
            $table->integer('late_penalty')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quests');
    }
}
