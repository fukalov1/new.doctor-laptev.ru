<?php

namespace App\Console\Commands;

use App\Answer;
use Illuminate\Console\Command;

class ImportAnswer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_answers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $answer;
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        parent::__construct();
        $this->answer = $answer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->answer->importAnswer();
    }
}
