<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // 1️⃣ ubah screenshot jadi json
            $table->json('screenshot')->nullable()->change();

            // 2️⃣ hapus subtype
            $table->dropColumn('subtype');

        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // balikin screenshot ke string
            $table->string('screenshot')->nullable()->change();

            // balikin subtype
            $table->string('subtype')->nullable();

        });
    }
};
