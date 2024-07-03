<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor')->nullable()->change();
            $table->foreign('instructor')
                ->references('id')->on('instructors')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign(['instructor']);
            $table->unsignedBigInteger('instructor')->change();
        });
    }
};
