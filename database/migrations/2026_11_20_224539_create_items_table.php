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
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('item_code', 20)->unique();
        $table->string('name', 100);
        $table->foreignId('category_id')->constrained();
        $table->foreignId('supplier_id')->constrained();
        $table->unsignedInteger('price');
        $table->unsignedInteger('stock')->default(0);
        $table->unsignedInteger('reorder_point')->default(10);
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
