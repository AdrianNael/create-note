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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id');
            $table->text('item');
            $table->date('due_date');
            $table->unsignedBigInteger('pic');
            $table->timestamp('created_at')->nullable();

            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->foreign('pic')->references('id')->on('participants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action');
    }
};
