<?php

namespace App\Console\Commands;

use App\GroupCode;
use Illuminate\Console\Command;

class ImportCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $groupCode;
    protected $description = 'Import access codes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GroupCode $groupCode)
    {
        parent::__construct();
        $this->groupCode = $groupCode;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->groupCode->importCodes();
    }
}
