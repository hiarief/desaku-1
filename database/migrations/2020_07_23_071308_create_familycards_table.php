<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilycardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familycards', function (Blueprint $table) {
            $table->id();
            $table->string('kk', 30);
            $table->string('nik', 30)->unique();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir', 100);
            $table->string('status_perkawinan', 20);
            $table->string('jenis_kelamin', 30);
            $table->string('alamat', 60);
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->string('pekerjaan', 50);
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
        Schema::dropIfExists('familycards');
    }
}
