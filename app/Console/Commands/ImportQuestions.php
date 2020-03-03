<?php

namespace App\Console\Commands;

use App\Question;
use Illuminate\Console\Command;

class ImportQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_questions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $question;
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        parent::__construct();
        $this->question = $question;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->question->importQuestion();
    }
}
