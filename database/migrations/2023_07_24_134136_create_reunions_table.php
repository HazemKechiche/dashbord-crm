<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionsTable extends Migration
{
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->string('nomReunion');
            $table->string('Emplacement');
            $table->dateTime('dateD');
            $table->dateTime('dateF');
            $table->string('Hote');
            $table->string('Rappel');
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reunions');
    }
}
