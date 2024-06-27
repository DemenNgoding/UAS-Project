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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->index()->primary()->autoIncrement();
            $table->foreignId('user_id')->constrained('users');
            // $table->foreignId('community_id')->constrained('community');
            $table->string('event_name');
            $table->string('content'); // berupa link nanti di cek lagi
            $table->string('location'); // akan connect ke google akan di cek nanti
            $table->text('caption');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
