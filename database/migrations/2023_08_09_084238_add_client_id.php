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
            $table->unsignedBigInteger('client_id'); // Add the client_id column
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('affaire', function (Blueprint $table) {
            $table->dropForeign(['client_id']); // Drop the foreign key constraint
            $table->dropColumn('client_id'); // Drop the client_id column
        });
    }
};
