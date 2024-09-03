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
        Schema::create('courriers', function (Blueprint $table) {
            $table->bigIncrements('id_courrier');
            $table->string('objet_courrier');
            $table->string('nature_courrier');
            $table->string('nom_exp');
            $table->string('nom_dest');
            $table->string('adresse_exp');
            $table->string('adresse_dest');
            $table->date('date_exp');
            $table->string('date_arrive');
            $table->enum('reception', ['reçu', 'non reçu']);
            $table->enum('type_courrier', ['entrant', 'sortant']);
            $table->text('resume')->nullable(); // Suppression de 'after'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
