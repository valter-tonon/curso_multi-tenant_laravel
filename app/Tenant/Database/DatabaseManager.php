<?php

namespace App\Tenant\Database;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

class DatabaseManager
{
    public function createDatabase(Company $company): bool
    {
        return DB::statement(
            "CREATE DATABASE {$company->bd_database} CHARACTER SET utf8 COLLATE utf8_unicode_ci"
        );
    }
}
