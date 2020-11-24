<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('divisi_id')->nullable();
            $table->string('judul')->nullable();
            $table->text('ket')->nullable();
            $table->string('file')->nullable();
            $table->timestamp('balasan_terbaru')->nullable();
            $table->enum('prioritas', ['Rendah', 'Sedang', 'Tinggi'])->default('Rendah');
            $table->enum('status', ['Buka', 'Balasan operator', 'Balasan client', 'Tutup'])->default('Buka');
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
        Schema::dropIfExists('tikets');
    }
}
