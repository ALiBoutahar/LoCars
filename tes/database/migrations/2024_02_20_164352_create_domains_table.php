<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->string('domain_sup')->nullable();
            $table->unique(['domain', 'domain_sup']);
            $table->timestamps();

        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
