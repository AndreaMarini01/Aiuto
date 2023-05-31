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
            $table->bigIncrements('idCoupon');
            $table->string('idAzienda');
            $table->string('oggetto');
            $table->string('modalità');
            $table->string('scontistica');
            $table->string('qrCode');
            $table->string('luogoFruizione');
            $table->date('dataScadenza');
            $table->string('nomeCoupon');
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
