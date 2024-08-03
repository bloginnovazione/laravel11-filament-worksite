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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worksite_id')->constrained('worksites')->cascadeOnDelete();
            $table->string('code');
            $table->string('type');
            $table->unsignedSmallInteger('room_number');
            $table->string('floor');
            $table->float('mqc');
            $table->double('price');
            $table->double('minimum_price');
            $table->double('minimum_deposit');
            $table->string('state');
            $table->string('attachment')->default('');
            $table->text('followup')->default('');
            $table->text('note')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
