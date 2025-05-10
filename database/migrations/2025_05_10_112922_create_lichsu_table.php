<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichsuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Migration cho bảng lichsu
public function up()
{
    Schema::create('lichsu', function (Blueprint $table) {
        $table->id();
        $table->unsignedInteger('chapter_id'); // Đảm bảo kiểu dữ liệu là unsignedInteger
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('truyen_id');
        $table->timestamps();

        // Các ràng buộc khóa ngoại
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('truyen_id')->references('id')->on('truyen')->onDelete('cascade');
        $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade'); // Ràng buộc khóa ngoại chapter_id
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lichsu');
    }
}
