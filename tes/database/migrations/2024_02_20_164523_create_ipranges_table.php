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
        Schema::create('ipranges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('domain_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('ip_range');
            $table->string('start');
            $table->string('end');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipranges');
    }
};
