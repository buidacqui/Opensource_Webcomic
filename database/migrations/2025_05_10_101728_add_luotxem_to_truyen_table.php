<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLuotxemToTruyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('truyen', function (Blueprint $table) {
            $table->unsignedBigInteger('luotxem')->default(0);
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('truyen', function (Blueprint $table) {
            $table->dropColumn('luotxem');
        });
    }
}
