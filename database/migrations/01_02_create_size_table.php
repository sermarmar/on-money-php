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
        Schema::create('size', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        DB::table('size')->insert([
            ['name' => 'XS', 'description' => 'Extra Pequeño'],
            ['name' => 'S', 'description' => 'Pequeño'],
            ['name' => 'M', 'description' => 'Mediano'],
            ['name' => 'L', 'description' => 'Grande'],
            ['name' => 'XL', 'description' => 'Extra Grande'],
            ['name' => 'XXL', 'description' => 'Extra Extra Grande']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('size')->truncate();
        Schema::dropIfExists('size');
    }
};
