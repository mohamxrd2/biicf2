<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('achat_group', function (Blueprint $table) {
            $table->id();
            $table->string('photoProd');
            $table->string('nameProd');
            $table->integer('quantité');
            $table->decimal('montantTotal', 10, 2);
            $table->string('localite');
            $table->boolean('reponse');
            $table->unsignedBigInteger('userTrader');
            $table->unsignedBigInteger('userSender');
            $table->unsignedBigInteger('idProd');
            $table->timestamps();

            // Foreign keys
            $table->foreign('userTrader')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('userSender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idProd')->references('id')->on('produit_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('achat_grouper', function (Blueprint $table) {
            Schema::dropIfExists('achat_grouper');
        });
    }
};
