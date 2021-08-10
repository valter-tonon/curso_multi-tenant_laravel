<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\CompanyCreated;
use App\Events\Tenant\DatabaseCreated;
use App\Tenant\Database\DatabaseManager;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateDatabaseCompany
{
    private $database;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     *
     * @param CompanyCreated $event
     * @return void
     * @throws Exception
     */
    public function handle(CompanyCreated $event)
    {
        $company = $event->company();

        if(!$this->database->createDatabase($company)){
            throw new Exception('Erro ao criar o banco de dados');
        }

        event(new DatabaseCreated($company));

    }
}
