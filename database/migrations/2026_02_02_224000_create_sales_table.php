<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('preference_id');
            $table->string('status')->default('pending');
            $table->decimal('amount', 8, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};