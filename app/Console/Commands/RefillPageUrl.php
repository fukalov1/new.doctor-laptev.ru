<?php

namespace App\Console\Commands;

use App\Page;
use Illuminate\Console\Command;

class RefillPageUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:refill_page_url {id} {prefix}';
    protected $page;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refill url pages';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Page $page)
    {
        parent::__construct();
        $this->page = $page;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->page->refillPageUrl($this->argument('id'),$this->argument('prefix'));
    }
}
