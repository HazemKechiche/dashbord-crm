<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('GestionnaireDuProspect');
            $table->string('Prénom');
            $table->string('Nom');
            $table->string('Titre')->nullable();
            $table->string('E-mail')->unique();
            $table->string('Téléphone')->nullable();
            $table->string('StatutduProspect');
            $table->decimal('ChiffreAffaires', 10, 2)->nullable();
            $table->integer('Nbredemployes')->nullable();
            $table->string('Address')->nullable();
            $table->string('Codepostal')->nullable();
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
        Schema::dropIfExists('prospects');
    }
}
