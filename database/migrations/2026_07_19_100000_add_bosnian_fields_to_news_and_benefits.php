<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table): void {
            $table->string('title_bs', 191)->nullable()->after('title');
            $table->text('summary_bs')->nullable()->after('summary');
            $table->longText('content_bs')->nullable()->after('content');
        });

        Schema::table('membership_benefits', function (Blueprint $table): void {
            $table->string('title_bs', 191)->nullable()->after('title');
            $table->string('discount_text_bs', 191)->nullable()->after('discount_text');
            $table->text('description_bs')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table): void {
            $table->dropColumn(['title_bs', 'summary_bs', 'content_bs']);
        });

        Schema::table('membership_benefits', function (Blueprint $table): void {
            $table->dropColumn(['title_bs', 'discount_text_bs', 'description_bs']);
        });
    }
};
