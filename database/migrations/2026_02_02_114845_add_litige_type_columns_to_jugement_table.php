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
            $table->string('نوع السجل')->nullable()->default('منازعة');
            $table->date('تاريخ استلام التظلم')->nullable();
            $table->date('تاريخ صدور الحكم النهائي')->nullable();
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
