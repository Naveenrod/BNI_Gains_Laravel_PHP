<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bni_gains_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->text('goals_intro')->nullable();
            $table->text('goals_input')->nullable();
            $table->text('accomplishments_intro')->nullable();
            $table->text('accomplishments_input')->nullable();
            $table->text('interests_intro')->nullable();
            $table->text('interests_input')->nullable();
            $table->text('networks_intro')->nullable();
            $table->text('networks_input')->nullable();
            $table->text('skills_intro')->nullable();
            $table->text('skills_input')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bni_gains_profile');
    }
};
