<?php

namespace App\Console\Commands;

use App\Data;
use Illuminate\Console\Command;

class data2Page extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:data2page';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    protected $data;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Data $data)
    {
        parent::__construct();
        $this->data = $data;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->data->data2Page();
    }
}
