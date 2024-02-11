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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('voiture_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('km_d');
            $table->string('km_f');
            $table->date('date_d');
            $table->date('date_f');
            $table->string('avance');
            $table->string('prix'); 
            $table->string('ttc');
            $table->text('status');
            $table->string('type');
            $table->string('delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
