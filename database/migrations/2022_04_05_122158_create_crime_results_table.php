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
        Schema::create('crime_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crime_case_id')->constrained()->onDelete('cascade');
            $table->foreignId('suspect_id')->constrained()->onDelete('cascade');
            $table->longText('notes');
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
        Schema::dropIfExists('crime_results');
    }
};
