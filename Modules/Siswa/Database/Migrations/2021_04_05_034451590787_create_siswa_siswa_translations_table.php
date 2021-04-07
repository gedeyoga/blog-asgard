<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaSiswaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa__siswa_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('siswa_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['siswa_id', 'locale']);
            $table->foreign('siswa_id')->references('id')->on('siswa__siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa__siswa_translations', function (Blueprint $table) {
            $table->dropForeign(['siswa_id']);
        });
        Schema::dropIfExists('siswa__siswa_translations');
    }
}
