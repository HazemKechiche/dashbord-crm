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
        Schema::table('affaire', function (Blueprint $table) {
            $table->string('GestionnaireAffaire');
            $table->string('NomAffaire');
            $table->string('NomClient');
            $table->string('Type');
            $table->string('OrigineProspect');
            $table->decimal('Montant', 10, 2);
            $table->date('DateEcheance');
            $table->string('Etape');
            $table->decimal('ChiffreAffaires', 10, 2);
            $table->text('DescriptionAttendue')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affaire', function (Blueprint $table) {
            //
        });
    }
};
