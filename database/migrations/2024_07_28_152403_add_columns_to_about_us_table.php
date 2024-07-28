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
        Schema::table('about_us', function (Blueprint $table) {
            $table->integer('completed_course')->nullable()->after('our_trainer_desc');
            $table->integer('active_student')->nullable()->after('completed_course');
            $table->integer('total_training_hours')->nullable()->after('active_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('completed_course');
            $table->dropColumn('active_student');
            $table->dropColumn('total_training_hours');
        });
    }
};
