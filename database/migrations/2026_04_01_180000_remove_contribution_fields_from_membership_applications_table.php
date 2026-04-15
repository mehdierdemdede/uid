<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('membership_applications', function (Blueprint $table): void {
            if (Schema::hasColumn('membership_applications', 'contribution_period')) {
                $table->dropColumn('contribution_period');
            }
            if (Schema::hasColumn('membership_applications', 'contribution_amount')) {
                $table->dropColumn('contribution_amount');
            }
        });
    }

    public function down(): void
    {
        Schema::table('membership_applications', function (Blueprint $table): void {
            $table->string('contribution_period', 20)->nullable()->after('membership_type');
            $table->decimal('contribution_amount', 10, 2)->nullable()->after('contribution_period');
        });
    }
};
