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
        Schema::create('book_ruangans', function (Blueprint $table) {
            $table->id();
            $table->text('agenda');
            $table->string('bagian');
            $table->string('ruang_meeting');
            $table->string('tanggal');
            $table->string('mulai_meeting');
            $table->string('selesai_meeting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_ruangans');
    }
};
