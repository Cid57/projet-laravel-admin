<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Supprimer les colonnes en double
            $table->dropColumn('postal_code');
            $table->dropColumn('city');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ajouter les colonnes si besoin de rollback
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
        });
    }
};
