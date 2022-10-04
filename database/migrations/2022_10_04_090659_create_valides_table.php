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
        Schema::create('valides', function (Blueprint $table) {
            $table->id();
            // $table->dateTime('date_validation');
            $table->foreignId(column: 'admins_id')->constrained(table: 'admin')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'supports_id')->constrained(table: 'support')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('valides');
    }
};
