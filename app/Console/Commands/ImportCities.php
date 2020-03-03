<?php

namespace App\Console\Commands;

use App\City;
use Illuminate\Console\Command;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $city;
    protected $description = 'Import cities from old database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(City $city)
    {
        parent::__construct();
        $this->city = $city;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->city->importCity();
    }
}
