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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer(column: 'age')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status', ['single', 'married'])->default('single');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
