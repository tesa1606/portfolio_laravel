<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->boolean('status_publish')->default(0); // 0 = Belum dipublish, 1 = Tampil di Frontend
            $table->timestamps();
        });
}


    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
