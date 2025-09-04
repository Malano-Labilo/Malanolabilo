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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //Judul dari Media
            $table->string('slug')->unique(); //Alamat dari Media yang akan ditampilkan di URL
            $table->string('excerpt')->nullable(); //Ringkasan pendek yang biasanya ditampilkan dengan thumbnail
            $table->text('body'); // deskripsi isi lengkap dari media
            $table->string('thumbnail')->nullable(); //Thumbnail dari Media
            $table->unsignedBigInteger('author_id'); //Penulis atau pembuat media
            $table->foreign('author_id')->references('id')->on('users');
            $table->string('category'); //Kategori dari media
            $table->string('link')->nullable(); //Link menuju media yg ada diplatform lain (Wordpress, Medium, dll)
            $table->timestamp('published_at')->nullable(); //Waktu kapan media di Upload

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
