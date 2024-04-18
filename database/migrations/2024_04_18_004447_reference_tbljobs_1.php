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
        Schema::table('tbluser', function (Blueprint $table) {
            $table->bigInteger('jobid')->unsigned()->nullable()->default(null);
            $table->foreign('jobid')->references('jobid')->on('tbluserjob')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbluser', function (Blueprint $table) {
            $table->dropForeign(['jobid']);
            $table->dropColumn('jobid');
        });
    }
};
