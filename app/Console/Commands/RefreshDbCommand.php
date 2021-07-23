<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDbCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database, migrate and seeds data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:refresh');

        $this->call('db:seed');

        $this->info('All databases successfully migrated and seeded.');
    }
}
