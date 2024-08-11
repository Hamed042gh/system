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
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider_id')->nullable()->unique();
            $table->string('provider_name')->nullable();
            $table->text('access_token')->nullable(); 
            $table->text('refresh_token')->nullable(); 
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'provider_id',
                'provider_name',
                'access_token',
                'refresh_token',
                'avatar'
            ]);
        });
    }
};
