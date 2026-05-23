<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('site_settings')->insert([
            ['key' => 'phone', 'value' => '+7 (999) 123-45-67', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'email', 'value' => 'info@stylecut.ru', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'address', 'value' => 'г. Москва, ул. Примерная, 123', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
