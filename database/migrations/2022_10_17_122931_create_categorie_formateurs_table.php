<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_formateurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'user_id')->nullable()->default(null)->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'categorie_id')->nullable()->default(null)->constrained(table: 'categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_formateurs');
    }
};
