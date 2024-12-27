<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_customer')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_menu')->constrained('menus')->onDelete('cascade');
            $table->integer('jumlah_menu');
            $table->decimal('total_harga', 10, 2);
            $table->string('metode_pengambilan');
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
