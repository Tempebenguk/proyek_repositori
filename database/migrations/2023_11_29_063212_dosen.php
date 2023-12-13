<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nidn')->unique();
            $table->string('password');
            $table->string('foto')->nullable();
            $table->string('jabatan'); // Kolom untuk jabatan dosen
            $table->string('bidang_keahlian'); // Kolom untuk bidang keahlian dosen
            $table->string('role')->default('dosen');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen');
    }
};
