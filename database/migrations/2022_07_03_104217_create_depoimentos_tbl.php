<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepoimentosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depoimentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('texto')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ref_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depoimentos_tbl');
    }
}
