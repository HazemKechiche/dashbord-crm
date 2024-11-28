<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('communication_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('type'); // For example, 'Appels téléphoniques', 'E-mails', etc.
            $table->string('subject')->nullable(); // Subject of the communication
            $table->text('content')->nullable(); // Content of the template
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('communication_templates');
    }
}
