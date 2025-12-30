<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->enum('season', ['summer', 'winter']); // Verão (Abril-Setembro), Inverno (Outubro-Março)
            $table->enum('day_of_week', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->boolean('is_open')->default(false);
            $table->time('morning_open')->nullable();
            $table->time('morning_close')->nullable();
            $table->time('afternoon_open')->nullable();
            $table->time('afternoon_close')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->unique(['season', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
