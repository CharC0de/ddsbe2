<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tbluser', function (Blueprint $table) {
            DB::statement("ALTER TABLE tbluser CHANGE COLUMN id userid INT(10);");
        });
    }


    public function down()
    {
        Schema::table('tbluser', function (Blueprint $table) {
            DB::statement("ALTER TABLE tbluser CHANGE COLUMN userid id INT(10);");
        });
    }
};