<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNomorToStringInStafTable extends Migration
{
    public function up()
    {
        Schema::table('staf', function (Blueprint $table) {
            $table->string('nomor', 13)->change();
        });
    }

    public function down()
    {
        Schema::table('staf', function (Blueprint $table) {
            $table->integer('nomor')->change();
        });
    }
}

