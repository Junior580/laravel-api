<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public const tables = ['products', 'services', 'categories', 'images', 'users'];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //FIXME: depois que todos tiverem com tenant vinculado remover ->nullable(), deve ser obrigatório
        foreach (self::tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->foreignId('tenant_id')
                    ->nullable()
                    ->constrained('tenants');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (self::tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropForeign(['tenant_id']);
                $table->dropColumn('tenant_id');
            });
        }
    }
};
