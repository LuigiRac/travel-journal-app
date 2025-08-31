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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            

            // Luogo
            $table->string('location')->nullable();

            // Contenuto del post
            $table->text('description')->nullable();
            $table->string('mood')->nullable();

            // Riflessioni
            $table->text('positive')->nullable();
            $table->text('negative')->nullable();

            // Valutazioni
            $table->tinyInteger('physical_effort')->nullable();
            $table->tinyInteger('economic_effort')->nullable(); 
            $table->decimal('cost', 8, 2)->nullable();

            // Tags
            $table->string('tags')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
