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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')
                ->nullable();
            $table->date('date_debut')
                ->nullable();
            $table->date('date_fin')
                ->nullable();
            $table->text('piece_jointe')
                ->nullable();
            $table->text('sequence')
                ->nullable();
            $table->date('date_ajout')
                ->nullable();
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
        Schema::dropIfExists('supports');
    }
};
