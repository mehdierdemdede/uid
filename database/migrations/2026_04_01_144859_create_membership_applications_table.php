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
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('birth_date');
            $table->string('birth_place')->nullable();
            $table->string('nationality', 100);
            $table->string('gender', 50)->nullable();
            $table->string('occupation', 120)->nullable();
            $table->string('education_level', 120)->nullable();
            $table->string('languages')->nullable();
            $table->string('correspondence_language', 120)->nullable();
            $table->string('email');
            $table->string('phone', 25);
            $table->string('mobile_phone', 25)->nullable();
            $table->string('address_line', 255)->nullable();
            $table->string('address_line_2', 255)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 120);
            $table->string('country', 120)->default('Bosna Hersek');
            $table->string('membership_type', 20);
            $table->text('join_reason')->nullable();
            $table->text('notes')->nullable();
            $table->string('iban', 34)->nullable();
            $table->string('bic', 11)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->dateTime('kvkk_approved_at');
            $table->dateTime('statute_approved_at');
            $table->boolean('contact_permission')->default(false);
            $table->string('captcha_provider', 20)->nullable();
            $table->decimal('captcha_score', 4, 2)->nullable();
            $table->string('source', 50)->default('web');
            $table->string('status', 20)->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('submitted_ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['status', 'city', 'membership_type']);
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
