<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employe_id');
            $table->string('jenis_cuti');
            $table->text('alasan');
            $table->string('lama_cuti');
            $table->enum('setuju', ['0', '1']);
            $table->date('tgl');
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
        Schema::dropIfExists('cuties');
    }
}
