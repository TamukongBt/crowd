<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaign_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('link');
            $table->string('image')->nullable();
            $table->integer('goal');
            $table->integer('userid');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_requests');
    }
};
