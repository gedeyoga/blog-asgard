<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLngColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswa__siswas', function (Blueprint $table) {
            $table->double('lat')->nullable()->after('gambar');
            $table->double('lng')->nullable()->after('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa__siswas', function (Blueprint $table) {
            $table->dropColumn(['lat','lng']);
        });
    }
}
