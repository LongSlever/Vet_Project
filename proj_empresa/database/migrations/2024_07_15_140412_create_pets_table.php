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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('breed'); // raça
            $table->string('specie');
            $table->string('color');
            $table->integer('age');
            $table->date('birth_date')->nullable();
            $table->decimal('weight',12,3); // peso
            $table->string('gender'); // sexo
            $table->string('photo')->nullable();
            $table->string('descript')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
