<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('type', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        DB::table('type')->insert([
            ['name' => 'Moda', 'description' => 'Categoría de moda'],
            ['name' => 'Electrónica', 'description' => 'Categoría de electrónica'],
            ['name' => 'Informática', 'description' => 'Categoría de informática'],
            ['name' => 'Deportes', 'description' => 'Categoría de deportes'],
        ]);

        Schema::create('subtype', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->foreignId('type_id')->constrained('type');
            $table->timestamp('created_at')->useCurrent();
        });

        DB::table('subtype')->insert([
            ['name' => 'Sudadera', 'description' => 'Ropa de sudadera', 'type_id' => '1'],
            ['name' => 'Camiseta', 'description' => 'Ropa de camiseta', 'type_id' => '1'],
            ['name' => 'Smartphone', 'description' => 'Teléfono inteligente', 'type_id' => '2'],
            ['name' => 'Laptop', 'description' => 'Computadora portátil', 'type_id' => '3'],
            ['name' => 'Tablet', 'description' => 'Dispositivo de tableta', 'type_id' => '3'],
            ['name' => 'Balón', 'description' => 'Balón de fútbol', 'type_id' => '4']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtype');
        Schema::dropIfExists('type');
    }
};
