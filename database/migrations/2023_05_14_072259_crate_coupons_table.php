<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->string('idCoupon');
            $table->string('idAzienda');
            $table->string('oggetto');
            $table->string('modalità');
            $table->string('scontistica');
            $table->string('qrCode');
            $table->string('luogoFruizione');
            $table->string('tempoFruizione');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_coupons');
    }
};
