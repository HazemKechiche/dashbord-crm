<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('GestionnaireDuContact', 255)->nullable();
            $table->string('Prenom', 255)->nullable();
            $table->string('Nom', 255)->nullable();
            $table->string('E-mail', 255)->nullable();
            $table->integer('Telephone')->nullable();
            $table->string('NomDuFournisseur', 255)->nullable();
            $table->string('Département', 255)->nullable();
            $table->integer('Telecopie')->nullable();
            $table->text('Adresse')->nullable();
            $table->integer('CodePostal')->nullable();
            $table->text('Description')->nullable();
            $table->unsignedBigInteger('idSecteur')->nullable(); // Ajout de la colonne idSecteur
    
            $table->foreign('idSecteur')->references('id')->on('secteurs')->onDelete('cascade'); // Ajout de la clé étrangère
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
