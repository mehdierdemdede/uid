<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE membership_applications MODIFY nationality VARCHAR(100) NULL");
            DB::statement("ALTER TABLE membership_applications MODIFY membership_type VARCHAR(20) NULL");
            DB::statement("ALTER TABLE membership_applications MODIFY birth_date DATE NULL");
        }
    }

    public function down(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE membership_applications MODIFY nationality VARCHAR(100) NOT NULL");
            DB::statement("ALTER TABLE membership_applications MODIFY membership_type VARCHAR(20) NOT NULL");
            DB::statement("ALTER TABLE membership_applications MODIFY birth_date DATE NOT NULL");
        }
    }
};
