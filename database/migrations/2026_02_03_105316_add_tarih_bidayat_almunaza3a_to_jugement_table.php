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
        Schema::table('jugement', function (Blueprint $table) {
            $table->date('تاريخ بداية المنازعة')->nullable()->after('تاريخ التسوية');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jugement', function (Blueprint $table) {
            //
        });
    }
};
