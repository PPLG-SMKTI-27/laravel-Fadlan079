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
    Schema::table('projects', function (Blueprint $table) {
        // ubah type jadi enum
        $table->enum('type', ['Website', 'Application','Design'])->change();

        // tambah subtype
        $table->string('subtype')->nullable()->after('type');
    });
}

public function down(): void
{
    Schema::table('projects', function (Blueprint $table) {
        // balikin type ke string
        $table->string('type')->change();

        // hapus subtype
        $table->dropColumn('subtype');
    });
}

};
