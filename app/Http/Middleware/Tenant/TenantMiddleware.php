<?php

namespace App\Http\Middleware\Tenant;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TenantMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $manager = app(ManagerTenant::class);
        $company = $this->getCompany($request->getHost());

        if (!$company) {
            abort(404);
        } else if (! $manager->domainIsMaster()) {
            $manager->setConnection($company);
        }
        return $next($request);
    }

    public function getCompany($host)
    {
        return Company::where('bd_hostname', $host)->first();
    }
}
