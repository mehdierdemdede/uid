<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table): void {
            $table->foreignId('created_by')->nullable()->after('published_at')->constrained('admins')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('admins')->nullOnDelete();
        });

        Schema::table('membership_applications', function (Blueprint $table): void {
            $table->foreignId('reviewed_by')->nullable()->after('admin_notes')->constrained('admins')->nullOnDelete();
        });

        Schema::table('contact_messages', function (Blueprint $table): void {
            $table->foreignId('read_by')->nullable()->after('is_read')->constrained('admins')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('created_by');
            $table->dropConstrainedForeignId('updated_by');
        });

        Schema::table('membership_applications', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('reviewed_by');
        });

        Schema::table('contact_messages', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('read_by');
        });
    }
};
