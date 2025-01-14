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
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        DB::table('status')->insert([
            ['name' => 'PENDIENTE', 'description' => 'Pendiente de procesamiento'],
            ['name' => 'COMPRADO', 'description' => 'Comprado por el cliente'],
            ['name' => 'PENDIENTE DE ENVÍO', 'description' => 'Pendiente de ser enviado'],
            ['name' => 'ENVIADO', 'description' => 'Enviado al cliente'],
            ['name' => 'RECIBIDO', 'description' => 'Recibido por el cliente'],
            ['name' => 'EN VENTA', 'description' => 'Disponible para la venta'],
            ['name' => 'VACÍO', 'description' => 'Sin stock disponible'],
            ['name' => 'CANCELADO', 'description' => 'Pedido cancelado']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
