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
        Schema::create('controles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('voiture_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nom')->nullable();
            $table->date('date_d')->nullable();
            $table->date('date_f')->nullable();
            $table->string('ste')->nullable();
            $table->string('agance')->nullable();
            $table->string('prix')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('controles');
    }
};
