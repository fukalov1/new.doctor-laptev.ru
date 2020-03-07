<?php

namespace App\Console\Commands;

use App\Review;
use Illuminate\Console\Command;

class ImportGb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_gb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $review;
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Review $review)
    {
        parent::__construct();
        $this->review = $review;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->review->importGb();
    }
}
