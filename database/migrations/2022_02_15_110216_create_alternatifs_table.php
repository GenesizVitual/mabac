<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('AL');
            $table->unsignedBigInteger('K01');
            $table->unsignedBigInteger('K02');
            $table->unsignedBigInteger('K03');

            $table->foreign('AL')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('K01')->references('id')->on('pekerjaan_ortus')->onDelete('cascade');
            $table->foreign('K02')->references('id')->on('penghasilan_ortus')->onDelete('cascade');
            $table->foreign('K03')->references('id')->on('tanggungans')->onDelete('cascade');

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
        Schema::dropIfExists('alternatifs');
    }
}
