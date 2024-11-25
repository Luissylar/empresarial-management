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
        Schema::create('password_vaults', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->text('password');
            $table->string('url')->nullable();
            $table->text('notes')->nullable(); 
            $table->enum('visibility', ['private', 'public']);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_vaults');
    }
};
