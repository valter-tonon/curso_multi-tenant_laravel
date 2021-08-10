<?php

namespace App\Tenant;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function config;

class ManagerTenant
{
    public function setConnection(Company $company)
    {
        DB::purge('tenant');

        config()->set('database.connections.tenant.host', 'mysql');
        config()->set('database.connections.tenant.database', $company->bd_database);
        config()->set('database.connections.tenant.username', $company->bd_username);
        config()->set('database.connections.tenant.password', $company->db_password);

        DB::reconnect('tenant');
        Schema::connection('tenant')->getConnection()->reconnect();
    }

    public function domainIsMaster()
    {
        return request()->getHost() == config('tenant.domain.master');
    }
}
