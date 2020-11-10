<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefnakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defnaker', function (Blueprint $table) {
            $table->id();
            $table->char('nomor', 30);
            $table->string('nik', 30);
            $table->string('lulusan', 30);
            $table->string('jurusan', 30);
            $table->string('tahunlulus', 30);
            $table->string('pengalaman', 255);
            $table->string('jenis', 20);
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
        Schema::dropIfExists('defnaker');
    }
}
