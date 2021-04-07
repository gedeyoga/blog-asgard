<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaMahasiswaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa__mahasiswa_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('mahasiswa_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['mahasiswa_id', 'locale']);
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa__mahasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa__mahasiswa_translations', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
        });
        Schema::dropIfExists('mahasiswa__mahasiswa_translations');
    }
}
