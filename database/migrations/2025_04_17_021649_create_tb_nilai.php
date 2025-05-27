<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->string('id_alternatif', 16);
            $table->string('id_kriteria', 16);
            $table->double('nilai');
            $table->timestamps();

            $table->unique(['id_alternatif', 'id_kriteria']);

            // Menambahkan foreign key untuk id_alternatif
            $table->foreign('id_alternatif')
                ->references('id_alternatif')
                ->on('tb_alternatif')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Menambahkan foreign key untuk id_kriteria
            $table->foreign('id_kriteria')
                ->references('id_kriteria')
                ->on('tb_kriteria')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_nilai');
    }
};
