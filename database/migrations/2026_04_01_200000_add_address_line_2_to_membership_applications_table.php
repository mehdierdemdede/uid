<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('membership_applications', function (Blueprint $table): void {
            if (! Schema::hasColumn('membership_applications', 'address_line_2')) {
                $table->string('address_line_2', 255)->nullable()->after('address_line');
            }
        });
    }

    public function down(): void
    {
        Schema::table('membership_applications', function (Blueprint $table): void {
            if (Schema::hasColumn('membership_applications', 'address_line_2')) {
                $table->dropColumn('address_line_2');
            }
        });
    }
};
