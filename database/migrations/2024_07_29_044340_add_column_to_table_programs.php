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
        Schema::table('programs', function (Blueprint $table) {
            $table->text('silabus')->nullable()->after('desc');
            $table->text('price_desc')->nullable()->after('silabus');
            $table->text('qualification')->nullable()->after('price_desc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('silabus');
            $table->dropColumn('price_desc');
            $table->dropColumn('qualification');
        });
    }
};
