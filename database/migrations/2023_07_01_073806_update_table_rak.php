<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableRak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //alter table rak
        Schema::table('raks', function (Blueprint $table) {
            $table->integer('is_active')->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remove field active
        Schema::table('raks', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
