<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // kolom gambar
            $table->timestamps();     // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
