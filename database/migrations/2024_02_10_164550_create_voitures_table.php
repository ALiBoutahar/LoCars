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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('matricule')->unique();
            $table->string('marque')->nullable();
            $table->string('color')->nullable();
            $table->string('model')->nullable();
            $table->string('km')->nullable();
            $table->string('nbrplace')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('voitures');
    }
};
