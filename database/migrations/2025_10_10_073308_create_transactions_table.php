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
       Schema::create('transactions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa yang berhutang
    $table->decimal('debt_amount', 10, 2); // Jumlah hutang
    $table->decimal('payment_amount', 10, 2)->nullable(); // Jumlah bayar
    $table->date('transaction_date');
    $table->string('description')->nullable(); // Keterangan (misal: Beli 1 Ton TBS)
    $table->enum('type', ['DEBT', 'PAYMENT']); // Jenis transaksi
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
