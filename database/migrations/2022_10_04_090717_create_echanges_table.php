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
        Schema::create('echanges', function (Blueprint $table) {
            $table->id();
            $table->text('commentaire');
            $table->foreignId(column: 'admins_id')->constrained(table: 'admin')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'users_id')->constrained(table: 'user')->onUpdate('cascade')->onDelete('cascade');
            // $table->dateTime('date_ajout');
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
        Schema::dropIfExists('echanges');
    }
};
