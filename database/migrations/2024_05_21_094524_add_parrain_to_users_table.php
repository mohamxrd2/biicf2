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
        Schema::table('users', function (Blueprint $table) {
            // Ajouter la colonne 'parrain' comme clé étrangère faisant référence à la même table 'users'
            $table->unsignedBigInteger('parrain')->nullable()->after('address');

            // Définir la clé étrangère sur la colonne 'parrain'
            $table->foreign('parrain')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Supprimer la clé étrangère et la colonne 'parrain' en cas de rollback
            $table->dropForeign(['parrain']);
            $table->dropColumn('parrain');
        });
    }
};
